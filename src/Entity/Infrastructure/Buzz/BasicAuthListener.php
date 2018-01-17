<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Listener\ListenerInterface;
use Buzz\Message\MessageInterface;
use Buzz\Message\RequestInterface;
use Webit\WFirmaSDK\Auth\BasicAuth;

final class BasicAuthListener implements ListenerInterface
{
    /** @var BasicAuth */
    private $auth;

    public function __construct(BasicAuth $auth)
    {
        $this->auth = $auth;
    }

    public function preSend(RequestInterface $request)
    {
        $request->addHeader(
            $this->auth->toHttpHeader()
        );
    }

    public function postSend(RequestInterface $request, MessageInterface $response)
    {
    }
}
