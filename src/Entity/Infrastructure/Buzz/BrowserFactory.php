<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Browser;
use Buzz\Client\Curl;
use Buzz\Middleware\BasicAuthMiddleware;
use Buzz\Middleware\MiddlewareInterface;
use Nyholm\Psr7\Factory\Psr17Factory;
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
    public function __construct(string $baseUrl = null, array $curlOptions = [])
    {
        $this->baseUrl = $baseUrl;
        $this->curlOptions = $curlOptions;
    }

    /**
     * @param Auth $auth
     * @return Browser
     */
    public function create(Auth $auth): Browser
    {
        $httpFactory = new Psr17Factory();
        $browser = new Browser(new Curl($httpFactory, $this->curlOptions), $httpFactory);

        $browser->addMiddleware(new BaseUrlMiddleware($this->baseUrl));
        $browser->addMiddleware($this->authMiddleware($auth));

        if ($companyId = $auth->companyId()) {
            $browser->addMiddleware(new CompanyIdMiddleware($companyId));
        }

        return $browser;
    }

    /**
     * Creates the middleware supporting given Auth implementation
     *
     * @param Auth $auth the auth implementation
     * @return MiddlewareInterface the middleware supporting given auth implementation
     * @throws \InvalidArgumentException when given auth implementation is not supported
     */
    private function authMiddleware(Auth $auth): MiddlewareInterface
    {
        switch (true) {
            case $auth instanceof BasicAuth:
                return new BasicAuthMiddleware($auth->username(), $auth->password());
            case $auth instanceof ApiKeysAuth:
                return new ApiKeysAuthMiddleware($auth);
            default:
                throw new \InvalidArgumentException(
                    sprintf("Auth method of \"%s\" is not supported.", get_class($auth))
                );
        }
    }
}
