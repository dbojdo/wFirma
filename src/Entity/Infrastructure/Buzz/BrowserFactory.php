<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Browser;
use Buzz\Client\Curl;
use Buzz\Middleware\BasicAuthMiddleware;
use Webit\WFirmaSDK\Auth\ApiKeysAuth;
use Webit\WFirmaSDK\Auth\Auth;
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
     * @param Auth $auth
     * @return Browser
     */
    public function create(Auth $auth)
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

    private function configureBuzzWithMiddleware(Browser $browser, Auth $auth)
    {
        $browser->addMiddleware(new BaseUrlMiddleware($this->baseUrl));
        switch(true) {
            case $auth instanceof BasicAuth:
                $browser->addMiddleware(new BasicAuthMiddleware($auth->username(), $auth->password()));
                break;
            case $auth instanceof ApiKeysAuth:
                $browser->addMiddleware(new ApiKeysAuthMiddleware($auth));
                break;
            default:
                throw new \OutOfBoundsException(
                    sprintf("Unsupported auth of class \"%s\"", get_class($auth))
                );
        }


        if ($companyId = $auth->companyId()) {
            $browser->addMiddleware(new CompanyIdMiddleware($companyId));
        }
    }

    private function configureBuzzWithListener(Browser $browser, Auth $auth)
    {
        $browser->addListener(new BaseUrlListener($this->baseUrl));
        switch(true) {
            case $auth instanceof BasicAuth:
                $browser->addListener(new BasicAuthListener($auth));
                break;
            case $auth instanceof ApiKeysAuth:
                $browser->addListener(new ApiKeysAuthListener($auth));
                break;
            default:
                throw new \OutOfBoundsException(
                    sprintf("Unsupported auth of class \"%s\"", get_class($auth))
                );
        }

        if ($companyId = $auth->companyId()) {
            $browser->addListener(new CompanyIdListener($companyId));
        }
    }
}
