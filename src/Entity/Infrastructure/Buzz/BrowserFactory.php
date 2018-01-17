<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Browser;
use Buzz\Client\Curl;
use Webit\WFirmaSDK\Auth\BasicAuth;

class BrowserFactory
{
    /** @var string|null */
    private $baseUrl;

    /**
     * @param string|null $baseUrl
     */
    public function __construct($baseUrl = null)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param BasicAuth $auth
     * @return Browser
     */
    public function create(BasicAuth $auth)
    {
        $browser = new Browser(new Curl());
        $browser->addListener(new BaseUrlListener($this->baseUrl));
        $browser->addListener(new BasicAuthListener($auth));

        if ($companyId = $auth->companyId()) {
            $browser->addListener(new CompanyIdListener($companyId));
        }

        return $browser;
    }
}
