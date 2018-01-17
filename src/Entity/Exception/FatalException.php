<?php

namespace Webit\WFirmaSDK\Entity\Exception;

use Webit\WFirmaSDK\Entity\Request;
use Webit\WFirmaSDK\Entity\Response;

class FatalException extends ApiException
{
    /**
     * @inheritdoc
     */
    protected static function message(Request $request, Response $response = null)
    {
        return 'Internal API error.';
    }
}