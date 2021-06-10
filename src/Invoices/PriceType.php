<?php

namespace Webit\WFirmaSDK\Invoices;

final class PriceType
{
    /** @var string */
    private $priceType;

    /**
     * @param string $priceType
     */
    private function __construct(string $priceType)
    {
        $this->priceType = strtolower($priceType);
    }

    /**
     * @return PriceType
     */
    public static function netto(): PriceType
    {
        return new self('netto');
    }

    /**
     * @return PriceType
     */
    public static function brutto(): PriceType
    {
        return new self('brutto');
    }

    /**
     * @param string $priceType
     * @return PriceType
     * @internal
     */
    public static function fromString(string $priceType): PriceType
    {
        return new self($priceType);
    }

    public function __toString()
    {
        return $this->priceType;
    }
}
