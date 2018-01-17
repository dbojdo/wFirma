<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\JMS;

use JMS\Serializer\Handler\DateHandler as JMSDateHandler;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\XmlDeserializationVisitor;

final class DateHandler extends JMSDateHandler
{
    public function deserializeDateTimeFromXml(XmlDeserializationVisitor $visitor, $data, array $type)
    {
        if (!(string)$data) {
            return null;
        }

        return parent::deserializeDateTimeFromXml($visitor, $data, $type);
    }

    public function deserializeDateTimeFromJson(JsonDeserializationVisitor $visitor, $data, array $type)
    {
        if (!(string)$data) {
            return null;
        }

        return parent::deserializeDateTimeFromJson($visitor, $data, $type);
    }
}
