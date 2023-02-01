<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Psr\Log\LoggerInterface;
use Webit\WFirmaSDK\Auth\Auth;
use Webit\WFirmaSDK\Entity\Infrastructure\RequestExecutor;
use Webit\WFirmaSDK\Entity\Infrastructure\RequestExecutorFactory;
use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\ApiSerialiserFactory;

final class BuzzRequestExecutorFactory implements RequestExecutorFactory
{
    /** @var BrowserFactory */
    private $browserFactory;

    /** @var ApiSerialiserFactory */
    private $apiSerialiserFactory;

    /** @var LoggerInterface */
    private $logger;

    public function __construct(
        BrowserFactory $browserFactory = null,
        ApiSerialiserFactory $apiSerialiserFactory = null,
        LoggerInterface $logger = null
    ) {
        $this->browserFactory = $browserFactory ?: new BrowserFactory();
        $this->apiSerialiserFactory = $apiSerialiserFactory ?: new ApiSerialiserFactory();
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function create(Auth $auth): RequestExecutor
    {
        return new BuzzRequestExecutor(
            $this->browserFactory->create($auth),
            $this->apiSerialiserFactory->create(),
            $this->logger
        );
    }
}
