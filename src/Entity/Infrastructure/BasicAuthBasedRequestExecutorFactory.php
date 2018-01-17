<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure;

use Webit\WFirmaSDK\Auth\BasicAuth;

interface BasicAuthBasedRequestExecutorFactory
{
    /**
     * @param BasicAuth $auth
     * @return RequestExecutor
     */
    public function create(BasicAuth $auth);
}
