<?php

namespace Webit\WFirmaSDK\Vat;

final class VatPlRate
{
    /** @var string */
    private $wFirmaCode;

    /**
     * @param string $wFirmaCode
     */
    private function __construct(string $wFirmaCode)
    {
        $this->wFirmaCode = $wFirmaCode;
    }

    public static function fromPercent(int $percent): VatPlRate
    {
        return new self((string)$percent);
    }

    /**
     * Represents polish VAT 23% rate (Rate "A")
     *
     * @return VatPlRate
     */
    public static function A(): VatPlRate
    {
        return self::fromPercent(23);
    }

    /**
     * Represents polish VAT 8% rate (Rate "B")
     *
     * @return VatPlRate
     */
    public static function B(): VatPlRate
    {
        return self::fromPercent(8);
    }

    /**
     * Represents polish VAT 5% rate (Rate "C")
     *
     * @return VatPlRate
     */
    public static function C(): VatPlRate
    {
        return self::fromPercent(5);
    }

    /**
     * Represents polish VAT 0% rate (Rate "D")
     *
     * @return VatPlRate
     */
    public static function D(): VatPlRate
    {
        return self::fromPercent(0);
    }

    /**
     * Represents polish VAT free rate (Rate "E")
     *
     * @return VatPlRate
     */
    public static function E(): VatPlRate
    {
        return new self('ZW');
    }

    /**
     * Represents polish 0% EU rate (Rate "WDT")
     *
     * @return VatPlRate
     */
    public static function WDT(): VatPlRate
    {
        return new self('WDT');
    }

    /**
     * Represents polish NP rate (Rate "NP")
     *
     * @return VatPlRate
     */
    public static function NP(): VatPlRate
    {
        return new self('NP');
    }

    /**
     * Represents polish NPUE rate (Rate "NPUE")
     *
     * @return VatPlRate
     */
    public static function NPUE(): VatPlRate
    {
        return new self('NPUE');
    }

    /**
     * Represents polish EXP rate (Rate "EXP")
     *
     * @return VatPlRate
     */
    public static function EXP(): VatPlRate
    {
        return new self('EXP');
    }

    /**
     * Represents polish VAT_BUYER rate (Rate "VAT_BUYER")
     *
     * @return VatPlRate
     */
    public static function VAT_BUYER(): VatPlRate
    {
        return self::fromWFirmaCode('VAT_BUYER');
    }

    public static function fromWFirmaCode(string $wFirmaCode): VatPlRate
    {
        return new self(strtoupper($wFirmaCode));
    }

    public function __toString(): string
    {
        return $this->wFirmaCode;
    }
}