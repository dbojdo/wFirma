<?php

namespace Webit\WFirmaSDK\Entity;

use Webit\WFirmaSDK\Auth\Auth;
use Webit\WFirmaSDK\Entity\Infrastructure\BasicAuthBasedRequestExecutorFactory;
use Webit\WFirmaSDK\Entity\Infrastructure\Buzz\BuzzRequestExecutorFactory;

class EntityApiFactory
{
    /** @var BasicAuthBasedRequestExecutorFactory */
    private $executorFactory;

    public function __construct(BasicAuthBasedRequestExecutorFactory $executorFactory = null)
    {
        $this->executorFactory = $executorFactory ?: new BuzzRequestExecutorFactory();
    }

    /**
     * @param Auth $auth
     * @return DefaultEntityApi
     */
    public function create(Auth $auth)
    {
        return new DefaultEntityApi(
            $this->executorFactory->create($auth)
        );
    }
}
