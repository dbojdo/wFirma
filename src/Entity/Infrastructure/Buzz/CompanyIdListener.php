<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Listener\ListenerInterface;
use Buzz\Message\MessageInterface;
use Buzz\Message\RequestInterface;
use Webit\WFirmaSDK\Auth\CompanyId;

final class CompanyIdListener implements ListenerInterface
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

    public function preSend(RequestInterface $request)
    {
        $resource = $request->getResource();
        $parsed = parse_url($resource);
        if (isset($parsed['query'])) {
            $resource .= sprintf('&company_id=%d', (string)$this->companyId);
        } else {
            $resource .= sprintf('?company_id=%d', (string)$this->companyId);
        }

        $request->setResource($resource);
    }

    public function postSend(RequestInterface $request, MessageInterface $response)
    {
    }
}