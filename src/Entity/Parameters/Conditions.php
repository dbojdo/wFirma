<?php

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;

final class Conditions
{
    const OPERATOR_AND = 'and';
    const OPERATOR_OR = 'or';
    const OPERATOR_NOT = 'not';
    const OPERATOR_EQ = 'eq';
    const OPERATOR_NE = 'ne';
    const OPERATOR_GT = 'gt';
    const OPERATOR_LT = 'lt';
    const OPERATOR_GE = 'ge';
    const OPERATOR_LE = 'le';
    const OPERATOR_LIKE = 'like';
    const OPERATOR_NOT_LIKE = 'not like';
    const OPERATOR_IS_NULL = 'is null';
    const OPERATOR_IS_NOT_NULL = 'is not null';
    const OPERATOR_IN = 'in';

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

    private function __construct($value, $operator = null, $field = null)
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

    /**
     * @param Conditions[] $conditions
     * @return Conditions
     */
    public static function andCondition(array $conditions)
    {
        return new self($conditions, self::OPERATOR_AND);
    }

    /**
     * @param Conditions[] $conditions
     * @return Conditions
     */
    public static function orCondition(array $conditions)
    {
        return new self($conditions, self::OPERATOR_OR);
    }

    /**
     * @param Conditions $conditions
     * @return Conditions
     */
    public static function not(Conditions $conditions)
    {
        return new self([$conditions], self::OPERATOR_NOT);
    }

    /**
     * @param string $field
     * @param string $value
     * @return Conditions
     */
    public static function eq($field, $value)
    {
        return new self($value, self::OPERATOR_EQ, $field);
    }

    /**
     * @param string $field
     * @param string $value
     * @return Conditions
     */
    public static function ne($field, $value)
    {
        return new self($value, self::OPERATOR_NE, $field);
    }

    /**
     * @param string $field
     * @param string $value
     * @return Conditions
     */
    public static function gt($field, $value)
    {
        return new self($value, self::OPERATOR_GT, $field);
    }
    /**
     * @param string $field
     * @param string $value
     * @return Conditions
     */
    public static function lt($field, $value)
    {
        return new self($value, self::OPERATOR_LT, $field);
    }

    /**
     * @param string $field
     * @param string $value
     * @return Conditions
     */
    public static function ge($field, $value)
    {
        return new self($value, self::OPERATOR_GE, $field);
    }

    /**
     * @param string $field
     * @param string $value
     * @return Conditions
     */
    public static function le($field, $value)
    {
        return new self($value, self::OPERATOR_LE, $field);
    }

    /**
     * @param string $field
     * @param string $value
     * @return Conditions
     */
    public static function like($field, $value)
    {
        return new self($value, self::OPERATOR_LIKE, $field);
    }

    /**
     * @param string $field
     * @param string $value
     * @return Conditions
     */
    public static function notLike($field, $value)
    {
        return new self($value, self::OPERATOR_NOT_LIKE, $field);
    }

    /**
     * @param string $field
     * @return Conditions
     */
    public static function isNull($field)
    {
        return new self(null, self::OPERATOR_IS_NULL, $field);
    }

    /**
     * @param string $field
     * @return Conditions
     */
    public static function isNotNull($field)
    {
        return new self(null, self::OPERATOR_IS_NOT_NULL, $field);
    }

    /**
     * @param string $field
     * @param array $values
     * @return Conditions
     */
    public static function in($field, array $values)
    {
        return new self(implode(',', $values), self::OPERATOR_IN, $field);
    }

    /**
     * @internal
     * @return Conditions
     */
    public function ensureContainer()
    {
        if ($this->operator) {
            return new self($this);
        }

        return $this;
    }
}
