<?php

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;

final class Fields
{
    /**
     * @var Field[]
     * @JMS\XmlList(inline=true,entry="field")
     * @JMS\Groups({"findRequest"})
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
    public function withField(Field $field): Fields
    {
        $fields = $this->fields;
        $fields[] = $field;

        return new self($fields);
    }

    /**
     * @param string[]|Field[] $fields
     * @return Fields
     */
    public static function fromArray(array $fields): Fields
    {
        return new self(
            array_map(function ($field) {
                return new Field((string)$field);
            },
                $fields)
        );
    }
}