<?php

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Context;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("fields")
 */
final class Fields
{
    /**
     * @var Field[]
     */
    private $fields;

    /**
     * @param Field[] $fields
     */
    private function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @param Field $field
     * @return Fields
     */
    public function withField(Field $field)
    {
        $fields = $this->fields;
        $fields[] = $field;

        return new self($fields);
    }

    /**
     * @param string[]|Field[] $fields
     * @return Fields
     */
    public static function fromArray(array $fields)
    {
        $arFields = array();
        foreach ($fields as $field) {
            $arFields[] = new Field((string)$field);
        }

        return new self($arFields);
    }

    /**
     * @JMS\HandlerCallback("xml", direction="serialization")
     */
    public function serializeToXml(XmlSerializationVisitor $visitor, $type, Context $context)
    {
        foreach ($this->fields as $field) {
            $context->accept($field, array('name' => 'Webit\WFirmaSDK\Entity\Parameters\Field'));
        }
    }

    /**
     * @JMS\HandlerCallback("xml", direction="deserialization")
     */
    public function deserializeFromXml(XmlDeserializationVisitor $visitor, $data, Context $context)
    {
        $fields = array();
        foreach ($data->field as $field) {
            $fields[] = new Field((string)$field);
        }
        $this->fields = $fields;
    }
}