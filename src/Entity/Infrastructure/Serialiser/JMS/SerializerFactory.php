<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\JMS;

use JMS\Serializer\EventDispatcher\EventDispatcherInterface;
use JMS\Serializer\Handler\DateHandler;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

class SerializerFactory
{
    /** @var string */
    private $timezone;

    public function __construct($timezone = 'Europe/Warsaw')
    {
        $this->timezone = $timezone;
    }

    /**
     * @return SerializerInterface
     */
    public function create()
    {
        $serializerBuilder = SerializerBuilder::create();

        $timezone = $this->timezone;
        $serializerBuilder->configureHandlers(function (HandlerRegistryInterface $registry) use ($timezone) {
            $registry->registerSubscribingHandler(new DateHandler(\DateTime::ISO8601, $timezone));
        });

        $serializerBuilder->configureListeners(function (EventDispatcherInterface $eventDispatcher) {
            $eventDispatcher->addSubscriber(new DateDeserializationListener());
            $eventDispatcher->addSubscriber(new RequestResponseSerializationListener());
        });

        return $serializerBuilder->build();
    }
}
