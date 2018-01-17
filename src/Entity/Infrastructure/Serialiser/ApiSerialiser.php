<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser;

use Webit\WFirmaSDK\Entity\Request;
use Webit\WFirmaSDK\Entity\Response;

interface ApiSerialiser
{
    /**
     * @param Request $request
     * @return string
     */
    public function serialise(Request $request);

    /**
     * @param string $response
     * @param Request $request
     * @return Response|object
     */
    public function deserialise($response, Request $request);
}
