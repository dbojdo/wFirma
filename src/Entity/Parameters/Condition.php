<?php

declare(strict_types=1);

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;

final class Condition implements \Webit\WFirmaSDK\Entity\Condition
{

    /**
     * @var string
     * @JMS\SerializedName("field")
     * @JMS\Type("string")
     * @JMS\Groups({"findRequest"})
     */
    private $field;
    /**
     * @var string
     * @JMS\SerializedName("operator")
     * @JMS\Type("string")
     * @JMS\Groups({"findRequest"})
     */
    private $operator;
    /**
     * @var string
     * @JMS\SerializedName("value")
     * @JMS\Type("string")
     * @JMS\Groups({"findRequest"})
     */
    private $value;

    private function __construct(string $field, string $operator, string $value)
    {
        $this->field = $field;
        $this->operator = $operator;
        $this->value = $value;
    }

    public static function eq(string $field, $value)
    {
        return new self($field, 'eq', $value);
    }

    public static function ne(string $field, $value)
    {
        return new self($field, 'ne', $value);
    }

    public static function gt(string $field, $value)
    {
        return new self($field, 'gt', $value);
    }

    public static function lt(string $field, $value)
    {
        return new self($field, 'lt', $value);
    }

    public static function ge(string $field, $value)
    {
        return new self($field, 'ge', $value);
    }

    public static function le(string $field, $value)
    {
        return new self($field, 'le', $value);
    }

    public static function like(string $field, $value)
    {
        return new self($field, 'like', $value);
    }

    public static function notLike(string $field, $value)
    {
        return new self($field, 'not like', $value);
    }

    public static function isNull(string $field, $value)
    {
        return new self($field, 'is null', $value);
    }

    public static function isNotNull(string $field, $value)
    {
        return new self($field, 'is not null', $value);
    }

    public static function in(string $field, $value)
    {
        return new self($field, 'in', $value);
    }
}
