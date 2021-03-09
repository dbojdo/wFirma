<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Listener\ListenerInterface;
use Buzz\Message\MessageInterface;
use Buzz\Message\RequestInterface;

final class BaseUrlListener implements ListenerInterface
{
    /** @var string */
    private static $defaultBaseUrl = 'https://api2.wfirma.pl';

    /** @var string */
    private $baseUrl;

    /**
     * @param string $baseUrl
     */
    public function __construct($baseUrl = null)
    {
        $this->baseUrl = $baseUrl ?: self::$defaultBaseUrl;
    }

    public function preSend(RequestInterface $request)
    {
        $request->setHost($this->baseUrl);
    }

    public function postSend(RequestInterface $request, MessageInterface $response)
    {
    }
}
