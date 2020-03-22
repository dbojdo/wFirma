<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\JMS;

use JMS\Serializer\Context;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;
use Webit\WFirmaSDK\Module;

final class RequestResponseSerializationListener implements EventSubscriberInterface
{
    /**
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return array(
            array(
                'event' => Events::PRE_SERIALIZE,
                'method' => 'preRequestSerialize',
                'class' => 'Webit\WFirmaSDK\Entity\Request',
                'format' => 'xml'
            ),
            array(
                'event' => Events::PRE_DESERIALIZE,
                'method' => 'preResponseDeserialize',
                'class' => 'Webit\WFirmaSDK\Entity\Response',
                'format' => 'xml'
            )
        );
    }

    public function preRequestSerialize(PreSerializeEvent $event)
    {
        $this->updateEntityWrapper('Webit\WFirmaSDK\Entity\Request', $event->getContext());
    }

    public function preResponseDeserialize(PreDeserializeEvent $event)
    {
        $this->updateEntityWrapper('Webit\WFirmaSDK\Entity\Response', $event->getContext());
    }

    private function updateEntityWrapper($className, Context $context)
    {
        /** @var Module $module */
        $module = $context->getAttribute('module');
        if (!$module) {
            new \InvalidArgumentException('Missing module');
        }

        $metaClass = $context->getMetadataFactory()->getMetadataForClass($className);
        $metaClass->propertyMetadata['entityWrapper']->serializedName = $module->name();

        $metaWrapperClass = $context->getMetadataFactory()->getMetadataForClass('Webit\WFirmaSDK\Entity\EntityWrapper');
        $metaWrapperClass->propertyMetadata['entities']->serializedName = (string)$module;
        $metaWrapperClass->propertyMetadata['entities']->type = array(
            'name' => 'array',
            'params' => array(
                array(
                    'name' => $module->entityClass()
                )
            )
        );

        $metaWrapperClass->propertyMetadata['entities']->xmlEntryName = $module->entityName();
    }
}
