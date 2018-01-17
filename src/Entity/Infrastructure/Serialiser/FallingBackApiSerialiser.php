<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser;

use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\Exception\ApiSerialiserException;
use Webit\WFirmaSDK\Entity\Request;

final class FallingBackApiSerialiser implements ApiSerialiser
{
    /** @var ApiSerialiser */
    private $serialiser;

    /** @var ApiSerialiser */
    private $fallbackSerialiser;

    /**
     * @param ApiSerialiser $serialiser
     * @param ApiSerialiser $fallbackSerialiser
     */
    public function __construct(ApiSerialiser $serialiser, ApiSerialiser $fallbackSerialiser)
    {
        $this->serialiser = $serialiser;
        $this->fallbackSerialiser = $fallbackSerialiser;
    }

    /**
     * @inheritdoc
     */
    public function serialise(Request $request)
    {
        try {
            return $this->serialiser->serialise($request);
        } catch (ApiSerialiserException $e) {
            return $this->fallbackSerialiser->serialise($request);
        }
    }

    /**
     * @inheritdoc
     */
    public function deserialise($response, Request $request)
    {
        try {
            return $this->serialiser->deserialise($response, $request);
        } catch (ApiSerialiserException $e) {
            return $this->fallbackSerialiser->deserialise($response, $request);
        }
    }
}
