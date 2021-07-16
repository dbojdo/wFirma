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

        if (interface_exists('Buzz\\Middleware\\MiddlewareInterface')) {
            $this->configureBuzzWithMiddleware($browser, $auth);
        } else {
            $this->configureBuzzWithListener($browser, $auth);
        }

        return $browser;
    }

    private function configureBuzzWithMiddleware(Browser $browser, BasicAuth $auth)
    {
        $browser->addMiddleware(new BaseUrlMiddleware($this->baseUrl));
        $browser->addMiddleware(new BasicAuthMiddleware($auth->username(), $auth->password()));

        if ($companyId = $auth->companyId()) {
            $browser->addMiddleware(new CompanyIdMiddleware($companyId));
        }
    }

    private function configureBuzzWithListener(Browser $browser, BasicAuth $auth)
    {
        $browser->addListener(new BaseUrlListener($this->baseUrl));
        $browser->addListener(new BasicAuthListener($auth));

        if ($companyId = $auth->companyId()) {
            $browser->addListener(new CompanyIdListener($companyId));
        }
    }
}
