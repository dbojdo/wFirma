<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure;

use Webit\WFirmaSDK\Entity\Request;
use Webit\WFirmaSDK\Entity\Response;

interface RequestExecutor
{
    /**
     * @param Request $request
     * @return Response
     */
    public function execute(Request $request);
}