<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser;

use Webit\WFirmaSDK\Entity\Request;

final class EmptyRequestApiSerialiser implements ApiSerialiser
{
    /** @var ApiSerialiser */
    private $apiSerialiser;

    public function __construct(ApiSerialiser $apiSerialiser)
    {
        $this->apiSerialiser = $apiSerialiser;
    }

    /**
     * @inheritdoc
     */
    public function serialise(Request $request)
    {
        if ($request->isBodyEmpty()) {
            return null;
        }

        return $this->apiSerialiser->serialise($request);
    }

    /**
     * @inheritdoc
     */
    public function deserialise($response, Request $request)
    {
        return $this->apiSerialiser->deserialise($response, $request);
    }
}
