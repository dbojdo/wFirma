<?php

namespace Webit\WFirmaSDK\Entity;

use Webit\WFirmaSDK\Auth\Auth;
use Webit\WFirmaSDK\Entity\Infrastructure\RequestExecutorFactory;
use Webit\WFirmaSDK\Entity\Infrastructure\Buzz\BuzzRequestExecutorFactory;

class EntityApiFactory
{
    /** @var RequestExecutorFactory */
    private $executorFactory;

    public function __construct(RequestExecutorFactory $executorFactory = null)
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
