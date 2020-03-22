<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\JMS;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

final class DateDeserializationListener implements EventSubscriberInterface
{
    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        $events = [];
        foreach (['DateTime', 'DateTimeImmutable', 'DateInterval'] as $type) {
            $events[] = [
                'event' => 'serializer.pre_deserialize',
                'method' => 'onPreDeserialize',
                'class' => $type,
                'format' => 'xml'
            ];
        }

        return $events;
    }

    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        /** @var \SimpleXMLElement $data */
        $data = $event->getData();
        if (!(string)$data) {
            $data->addAttribute("xsi:nil", "true", "http://www.w3.org/2001/XMLSchema-instance");
        }
    }
}
