<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Middleware\MiddlewareInterface;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class CompanyIdMiddleware implements MiddlewareInterface
{
    /** @var int */
    private $companyId;

    /**
     * @param int $companyId
     */
    public function __construct($companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @inheritdoc
     */
    public function handleRequest(RequestInterface $request, callable $next)
    {
        $resource = $request->getUri();
        $parsed = parse_url($resource);
        if (isset($parsed['query'])) {
            $resource .= sprintf('&company_id=%d', (string)$this->companyId);
        } else {
            $resource .= sprintf('?company_id=%d', (string)$this->companyId);
        }

        return $next(
            $request->withUri(
                new Uri($resource)
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