<?php

namespace Webit\WFirmaSDK\Entity\Exception;

use Webit\WFirmaSDK\Entity\Request;
use Webit\WFirmaSDK\Entity\Response;

class ActionNotFound extends ApiException
{
    /**
     * @inheritdoc
     */
    protected static function message(Request $request, Response $response = null)
    {
        return 'Required action does not exist.';
    }
}
