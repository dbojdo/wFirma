<?php

namespace Webit\WFirmaSDK\Invoices;

final class TypeOfSale
{
    /** @var string */
    private $typeOfSale;

    /**
     * @param array $typeOfSale
     */
    private function __construct($typeOfSale)
    {
        $this->typeOfSale = (string)$typeOfSale;
    }

    /**
     * @return TypeOfSale
     */
    public static function EE()
    {
        return new self('EE');
    }

    /**
     * @return TypeOfSale
     */
    public static function SW()
    {
        return new self('SW');
    }

    /**
     * @param string $typeOfSale
     * @return TypeOfSale
     * @internal
     */
    public static function fromString($typeOfSale)
    {
        return new self($typeOfSale);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->typeOfSale;
    }
}
