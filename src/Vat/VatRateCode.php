<?php

namespace Webit\WFirmaSDK\Vat;

/**
 * Convenience wrapper for wFirma VAT rates (to use instead of VatCodeId on some objects creation)
 */
final class VatRateCode
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

    /**
     * A named constructor to create VatPlRate from percent value
     *
     * @param int $percent
     * @return VatRateCode
     */
    public static function fromPercent(int $percent): VatRateCode
    {
        return new self((string)$percent);
    }

    /**
     * A named constructor to create VatPlRate from wFirma internal code
     *
     * @param string $wFirmaCode
     * @return VatRateCode
     */
    public static function fromWFirmaCode(string $wFirmaCode): VatRateCode
    {
        return new self(strtoupper($wFirmaCode));
    }

    /**
     * Represents polish VAT 23% rate (Rate "A")
     *
     * @return VatRateCode
     */
    public static function A(): VatRateCode
    {
        return self::fromPercent(23);
    }

    /**
     * Represents polish VAT 8% rate (Rate "B")
     *
     * @return VatRateCode
     */
    public static function B(): VatRateCode
    {
        return self::fromPercent(8);
    }

    /**
     * Represents polish VAT 5% rate (Rate "C")
     *
     * @return VatRateCode
     */
    public static function C(): VatRateCode
    {
        return self::fromPercent(5);
    }

    /**
     * Represents polish VAT 0% rate (Rate "D")
     *
     * @return VatRateCode
     */
    public static function D(): VatRateCode
    {
        return self::fromPercent(0);
    }

    /**
     * Represents polish VAT free rate (Rate "E")
     *
     * @return VatRateCode
     */
    public static function E(): VatRateCode
    {
        return new self('ZW');
    }

    /**
     * Represents polish 0% EU rate (Rate "WDT")
     *
     * @return VatRateCode
     */
    public static function WDT(): VatRateCode
    {
        return new self('WDT');
    }

    /**
     * Represents polish NP rate (Rate "NP")
     *
     * @return VatRateCode
     */
    public static function NP(): VatRateCode
    {
        return new self('NP');
    }

    /**
     * Represents polish NPUE rate (Rate "NPUE")
     *
     * @return VatRateCode
     */
    public static function NPUE(): VatRateCode
    {
        return new self('NPUE');
    }

    /**
     * Represents polish EXP rate (Rate "EXP")
     *
     * @return VatRateCode
     */
    public static function EXP(): VatRateCode
    {
        return new self('EXP');
    }

    /**
     * Represents polish VAT_BUYER rate (Rate "VAT_BUYER")
     *
     * @return VatRateCode
     */
    public static function VAT_BUYER(): VatRateCode
    {
        return self::fromWFirmaCode('VAT_BUYER');
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->wFirmaCode;
    }
}