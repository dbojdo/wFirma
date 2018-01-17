<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\JMS;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\ApiSerialiser;
use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\Exception\DeserialisationException;
use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\Exception\SerialisationException;
use Webit\WFirmaSDK\Entity\Request;

final class JmsApiSerialiser implements ApiSerialiser
{
    /** @var SerializerInterface */
    private $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @inheritdoc
     */
    public function serialise(Request $request)
    {
        $context = SerializationContext::create();
        $context->attributes->set('module', $request->module());
        $context->setGroups(array('request', sprintf('%sRequest', $request->action())));

        try {
            return $this->serializer->serialize($request, 'xml', $context);
        } catch (RuntimeException $e) {
            throw SerialisationException::createForRequest($request, 0, $e);
        }

    }

    /**
     * @inheritdoc
     */
    public function deserialise($response, Request $request)
    {
        $context = DeserializationContext::create();
        $context->attributes->set('module', $request->module());
        $context->setGroups(array("response", sprintf('%sResponse', $request->action())));

        try {
            return $this->serializer->deserialize(
                $response,
                'Webit\WFirmaSDK\Entity\Response',
                'xml',
                $context
            );
        } catch (RuntimeException $e) {
            throw DeserialisationException::createForRequest($request, 0, $e);
        }
    }
}
