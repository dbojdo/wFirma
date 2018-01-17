<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser;

use Webit\WFirmaSDK\Entity\File;
use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\Exception\UnsupportedModuleOrActionException;
use Webit\WFirmaSDK\Entity\Request;
use Webit\WFirmaSDK\Entity\Response;

final class FileResponseSerialiser implements ApiSerialiser
{
    /**
     * @inheritdoc
     */
    public function serialise(Request $request)
    {
        throw UnsupportedModuleOrActionException::create($request->module(), $request->action());
    }

    /**
     * @inheritdoc
     */
    public function deserialise($response, Request $request)
    {
        return Response::fileResponse(new File($response));
    }
}
