<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\JMS;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;
use Webit\WFirmaSDK\Contractors\Contractor;

/**
 * Handles serialization / deserialization of the Contractor entity
 */
final class ContractorHandler implements SubscribingHandlerInterface, EventSubscriberInterface
{

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        $events = [];
        foreach ([Contractor::class] as $type) {
            $events[] = [
                'event' => 'serializer.post_serialize',
                'method' => 'onPostSerialize',
                'class' => $type,
                'format' => 'xml'
            ];
        }

        return $events;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'xml',
                'type' => 'Contractor',
                'method' => 'deserialiseFromXml',
            ],
        ];
    }

    /**
     * Adds / modifies custom fields in the result XML object
     * This method is not in use now as the API does not support custom fields writing
     *
     * @param ObjectEvent $event
     */
    public function onPostSerialize(ObjectEvent $event)
    {
        /** @var XmlSerializationVisitor $visitor */
        $visitor = $event->getVisitor();

        $contractorNode = $visitor->getCurrentNode();
        $document = $contractorNode->ownerDocument;

        /** @var \DOMNode $customFields */
        $customFields = $contractorNode->getElementsByTagName('custom_fields')->item(0);
        if (!$customFields || $customFields->childNodes->length == 0) {
            return;
        }

        $contractorNode->removeChild($customFields);
        while ($customFields->childNodes->length > 0) {
            $customFieldNode = $contractorNode->appendChild($customFields->childNodes->item(0));

            $content = $customFieldNode->textContent;
            $customFieldNode->textContent = null;
            $valueNode = $document->createElement('value');
            $customFieldNode->appendChild($valueNode);
            $valueNode->appendChild($document->createCDATASection($content));
        }
        $contractorNode->appendChild($document->createElement('field'));
    }

    public function deserialiseFromXml(XmlDeserializationVisitor $visitor, \SimpleXMLElement $data, array $type, DeserializationContext $context)
    {
        /** @var Contractor $contractor */
        $contractor = $context->getNavigator()->accept($data, ['name' => Contractor::class, 'params' => []]);
        $customFields = [];
        foreach ($data->children() as $child) {
            if (0 === strpos($child->getName(), 'field_value')) {
                $customFields[$child->getName()] = (string)$child->value;
            }
        }
        $contractor->setCustomFields($customFields);

        return $contractor;
    }
}