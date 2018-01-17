<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser;

use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\Exception\UnsupportedModuleOrActionException;
use Webit\WFirmaSDK\Entity\Request;;

final class ByModuleAndActionApiSerialiser implements ApiSerialiser
{
    /** @var ApiSerialiser[] */
    private $serialisers;

    public function __construct()
    {
        $this->serialisers = array();
    }

    public function registerSerialiser(ApiSerialiser $serialiser, $moduleName, $action)
    {
        $this->serialisers[sprintf('%s:%s', $moduleName, $action)] = $serialiser;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function serialise(Request $request)
    {
        $serialiser = $this->selectSerialiser($request);

        return $serialiser->serialise($request);
    }

    /**
     * @inheritdoc
     */
    public function deserialise($response, Request $request)
    {
        $serialiser = $this->selectSerialiser($request);

        return $serialiser->deserialise($response, $request);
    }

    /**
     * @param Request $request
     * @return ApiSerialiser
     */
    private function selectSerialiser(Request $request)
    {
        $key = sprintf('%s:%s', $request->module(), $request->action());
        if (isset($this->serialisers[$key])) {
            return $this->serialisers[$key];
        }

        throw UnsupportedModuleOrActionException::create((string)$request->module(), $request->action());
    }
}