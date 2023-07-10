<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure;

use Webit\WFirmaSDK\Auth\Auth;

interface BasicAuthBasedRequestExecutorFactory
{
    /**
     * @param Auth $auth
     * @return RequestExecutor
     */
    public function create(Auth $auth);
}
