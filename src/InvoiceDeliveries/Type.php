<?php

namespace Webit\WFirmaSDK\InvoiceDeliveries;

final class Type
{
    /** @var string */
    private $type;

    /**
     * @param string $type
     */
    private function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return Type
     */
    public static function good()
    {
        return new self('good');
    }

    /**
     * @return Type
     */
    public static function correction()
    {
        return new self('correction');
    }

    /**
     * @param string $type
     * @return Type
     * @internal
     */
    public static function fromString($type)
    {
        return new self($type);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->type;
    }
}