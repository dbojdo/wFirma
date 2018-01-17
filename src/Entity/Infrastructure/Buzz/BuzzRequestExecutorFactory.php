<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Psr\Log\LoggerInterface;
use Webit\WFirmaSDK\Entity\Infrastructure\BasicAuthBasedRequestExecutorFactory;
use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\ApiSerialiserFactory;
use Webit\WFirmaSDK\Auth\BasicAuth;

final class BuzzRequestExecutorFactory implements BasicAuthBasedRequestExecutorFactory
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
     * @param BasicAuth $basicAuth
     * @return BuzzRequestExecutor
     */
    public function create(BasicAuth $basicAuth)
    {
        return new BuzzRequestExecutor(
            $this->browserFactory->create($basicAuth),
            $this->apiSerialiserFactory->create(),
            $this->logger
        );
    }
}
