<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Browser;
use Buzz\Client\Curl;
use Buzz\Middleware\BasicAuthMiddleware;
use Webit\WFirmaSDK\Auth\BasicAuth;

final class BrowserFactory
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

        $browser->addMiddleware(new BaseUrlMiddleware($this->baseUrl));
        $browser->addMiddleware(new BasicAuthMiddleware($auth->username(), $auth->password()));

        if ($companyId = $auth->companyId()) {
            $browser->addMiddleware(new CompanyIdMiddleware($companyId));
        }

        return $browser;
    }
}
