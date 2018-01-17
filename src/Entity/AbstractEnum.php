<?php

namespace Webit\WFirmaSDK\Entity;

abstract class AbstractEnum
{
    /** @var string */
    private $value;

    /**
     * @param string $value
     */
    final protected function __construct($value)
    {
        $this->value = (string)$value;
    }

    /**
     * @param string $value
     * @return static
     * @internal
     */
    final public static function fromString($value)
    {
        return new static($value);
    }

    /**
     * @inheritdoc
     */
    final public function __toString()
    {
        return $this->value;
    }
}
