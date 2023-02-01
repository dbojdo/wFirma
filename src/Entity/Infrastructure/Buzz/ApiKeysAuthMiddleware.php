<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Middleware\MiddlewareInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Webit\WFirmaSDK\Auth\ApiKeysAuth;

/**
 * Supports wFirma API Keys authentication
 */
final class ApiKeysAuthMiddleware implements MiddlewareInterface
{
    /** @var ApiKeysAuth */
    private $auth;

    public function __construct(ApiKeysAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @inheritDoc
     */
    public function handleRequest(RequestInterface $request, callable $next)
    {
        $request = $request
            ->withHeader("accessKey", $this->auth->accessKey())
            ->withHeader("secretKey", $this->auth->secretKey())
            ->withHeader("appKey", $this->auth->appKey());

        return $next($request);
    }

    /**
     * @inheritDoc
     */
    public function handleResponse(RequestInterface $request, ResponseInterface $response, callable $next)
    {
        return $next($request, $response);
    }
}
