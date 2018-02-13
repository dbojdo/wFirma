<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Browser;
use Buzz\Client\Curl;
use Webit\WFirmaSDK\Auth\BasicAuth;

class BrowserFactory
{
    /** @var string|null */
    private $baseUrl;

    /** @var array */
    private $curlOptions;

    /**
     * @param string|null $baseUrl
     * @param array $curlOptions
     */
    public function __construct($baseUrl = null, array $curlOptions = [])
    {
        $this->baseUrl = $baseUrl;
        $this->curlOptions = $curlOptions;
    }

    /**
     * @param BasicAuth $auth
     * @return Browser
     */
    public function create(BasicAuth $auth)
    {
        $browser = new Browser($client = new Curl());
        foreach ($this->curlOptions as $option => $value) {
            $client->setOption($option, $value);
        }

        $browser->addListener(new BaseUrlListener($this->baseUrl));
        $browser->addListener(new BasicAuthListener($auth));

        if ($companyId = $auth->companyId()) {
            $browser->addListener(new CompanyIdListener($companyId));
        }

        return $browser;
    }
}
