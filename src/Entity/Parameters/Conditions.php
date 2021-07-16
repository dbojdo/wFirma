<?php

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;

final class Conditions
{
    private const OPERATOR_AND = 'and';
    private const OPERATOR_OR = 'or';
    private const OPERATOR_NOT = 'not';
    private const OPERATOR_EQ = 'eq';
    private const OPERATOR_NE = 'ne';
    private const OPERATOR_GT = 'gt';
    private const OPERATOR_LT = 'lt';
    private const OPERATOR_GE = 'ge';
    private const OPERATOR_LE = 'le';
    private const OPERATOR_LIKE = 'like';
    private const OPERATOR_NOT_LIKE = 'not like';
    private const OPERATOR_IS_NULL = 'is null';
    private const OPERATOR_IS_NOT_NULL = 'is not null';
    private const OPERATOR_IN = 'in';

    /**
     * @var Conditions[]
     * @JMS\Type("array<Webit\WFirmaSDK\Entity\Parameters\Conditions>")
     * @JMS\SerializedName("and")
     * @JMS\XmlList(entry="condition")
     * @JMS\Groups({"findRequest"})
     */
    private $and;

    /**
     * @var Conditions[]
     * @JMS\Type("array<Webit\WFirmaSDK\Entity\Parameters\Conditions>")
     * @JMS\SerializedName("or")
     * @JMS\Groups({"findRequest"})
     * @JMS\XmlList(entry="condition")
     */
    private $or;

    /**
     * @var Conditions[]
     * @JMS\Type("array<Webit\WFirmaSDK\Entity\Parameters\Conditions>")
     * @JMS\SerializedName("not")
     * @JMS\Groups({"findRequest"})
     * @JMS\XmlList(entry="condition")
     */
    private $not;

    /**
     * @var Conditions
     * @JMS\SerializedName("condition")
     * @JMS\Groups({"findRequest"})
     */
    private $condition;

    /**
     * @var string
     * @JMS\SerializedName("field")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @JMS\Groups({"findRequest"})
     */
    private $field;

    /**
     * @var string
     * @JMS\SerializedName("operator")
     * @JMS\XmlElement(cdata=false)
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

    private function __construct($value, ?string $operator = null, ?string $field = null)
    {
        if ($value instanceof Conditions) {
            $this->condition = $value;
            return;
        }

        switch ($operator) {
            case self::OPERATOR_AND:
                $this->and = $value;
                break;
            case self::OPERATOR_OR:
                $this->or = $value;
                break;
            case self::OPERATOR_NOT:
                $this->not = $value;
                break;
            default:
                $this->field = $field;
                $this->operator = $operator;
                $this->value = $value;
        }
    }

    public static function and(Conditions ...$conditions): Conditions
    {
        return new self($conditions, self::OPERATOR_AND);
    }

    public static function or(Conditions ...$conditions): Conditions
    {
        return new self($conditions, self::OPERATOR_OR);
    }

    public static function not(Conditions $conditions): Conditions
    {
        return new self([$conditions], self::OPERATOR_NOT);
    }

    public static function eq(string $field, string $value): Conditions
    {
        return new self($value, self::OPERATOR_EQ, $field);
    }

    public static function ne(string $field, string $value): Conditions
    {
        return new self($value, self::OPERATOR_NE, $field);
    }

    public static function gt(string $field, string $value): Conditions
    {
        return new self($value, self::OPERATOR_GT, $field);
    }

    public static function lt(string $field, string $value): Conditions
    {
        return new self($value, self::OPERATOR_LT, $field);
    }

    public static function ge(string $field, string $value): Conditions
    {
        return new self($value, self::OPERATOR_GE, $field);
    }

    public static function le(string $field, string $value): Conditions
    {
        return new self($value, self::OPERATOR_LE, $field);
    }

    public static function like(string $field, string $value): Conditions
    {
        return new self($value, self::OPERATOR_LIKE, $field);
    }

    public static function notLike(string $field, string $value): Conditions
    {
        return new self($value, self::OPERATOR_NOT_LIKE, $field);
    }

    public static function isNull(string $field): Conditions
    {
        return new self(null, self::OPERATOR_IS_NULL, $field);
    }

    public static function isNotNull(string $field): Conditions
    {
        return new self(null, self::OPERATOR_IS_NOT_NULL, $field);
    }

    public static function in(string $field, array $values): Conditions
    {
        return new self(implode(',', $values), self::OPERATOR_IN, $field);
    }

    /**
     * @internal
     * @return Conditions
     */
    public function ensureContainer(): Conditions
    {
        if ($this->operator) {
            return new self($this);
        }

        return $this;
    }
}
