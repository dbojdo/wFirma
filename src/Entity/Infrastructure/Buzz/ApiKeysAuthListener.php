<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Webit\WFirmaSDK\Auth\ApiKeysAuth;
use Buzz\Listener\ListenerInterface;
use Buzz\Message\MessageInterface;
use Buzz\Message\RequestInterface;

final class ApiKeysAuthListener implements ListenerInterface
{
    /** @var ApiKeysAuth */
    private $auth;

    public function __construct(ApiKeysAuth $auth)
    {
        $this->auth = $auth;
    }

    public function preSend(RequestInterface $request)
    {
        $request->addHeader('accessKey', $this->auth->accessKey());
        $request->addHeader('secretKey', $this->auth->secretKey());
        $request->addHeader('appKey', $this->auth->appKey());

    }

    public function postSend(RequestInterface $request, MessageInterface $response)
    {
    }
}