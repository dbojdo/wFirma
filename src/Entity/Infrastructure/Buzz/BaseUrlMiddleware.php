<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Middleware\MiddlewareInterface;
use Nyholm\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class BaseUrlMiddleware implements MiddlewareInterface
{
    /** @var string */
    private static $defaultBaseUrl = 'https://api2.wfirma.pl';

    /** @var string */
    private $baseUrl;

    public function __construct($baseUrl = null)
    {
        $this->baseUrl = $baseUrl ?: self::$defaultBaseUrl;
    }

    /**
     * @inheritdoc
     */
    public function handleRequest(RequestInterface $request, callable $next)
    {
        return $next(
            $request->withUri(
                new Uri(
                    sprintf('%s/%s', $this->baseUrl, ltrim($request->getUri(), '/'))
                )
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function handleResponse(RequestInterface $request, ResponseInterface $response, callable $next)
    {
        return $next($request, $response);
    }
}
