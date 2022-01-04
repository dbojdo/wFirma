<?php

namespace Webit\WFirmaSDK\Vat;

/**
 * Wraps VatCodeId or simple string VAT code that can be passed for create / edit actions
 */
final class VatRate
{
    /** @var ?string */
    private $code;

    /** @var ?VatCodeId */
    private $vatCodeId;

    private function __construct(?string $code = null, ?VatCodeId $vatCodeId = null)
    {
        $this->code = $code;
        $this->vatCodeId = $vatCodeId;
    }

    public static function fromCode(string $code): VatRate
    {
        return new self($code);
    }

    public static function fromVatCodeId(VatCodeId $vatCodeId): VatRate
    {
        return new self(null, $vatCodeId);
    }

    public function code(): ?string
    {
        return $this->code;
    }

    public function vatCodeId(): ?VatCodeId
    {
        return $this->vatCodeId;
    }

    /**
     * Creates the VatRate of "23%"
     *
     * @return VatRate
     */
    public static function VAT23(): VatRate
    {
        return self::fromCode('23');
    }

    /**
     * Creates the VatRate of "8%"
     *
     * @return VatRate
     */
    public static function VAT8(): VatRate
    {
        return self::fromCode('8');
    }

    /**
     * Creates the VatRate of "5%"
     *
     * @return VatRate
     */
    public static function VAT5(): VatRate
    {
        return self::fromCode('5');
    }

    /**
     * Creates the VatRate of "22%"
     *
     * @return VatRate
     */
    public static function VAT22(): VatRate
    {
        return self::fromCode('22');
    }

    /**
     * Creates the VatRate of "7%"
     *
     * @return VatRate
     */
    public static function VAT7(): VatRate
    {
        return self::fromCode('7');
    }

    /**
     * Creates the VatRate of "3%"
     *
     * @return VatRate
     */
    public static function VAT3(): VatRate
    {
        return self::fromCode('3');
    }

    /**
     * Creates the VatRate of "0% WDT"
     *
     * @return VatRate
     */
    public static function WDT(): VatRate
    {
        return self::fromCode('WDT');
    }

    /**
     * Creates the VatRate of "0% Exp."
     *
     * @return VatRate
     */
    public static function EXP(): VatRate
    {
        return self::fromCode('EXP');
    }

    /**
     * Creates the VatRate of "nie podl."
     *
     * @return VatRate
     */
    public static function NP(): VatRate
    {
        return self::fromCode('NP');
    }

    /**
     * Creates the VatRate of "nie podl. UE"
     *
     * @return VatRate
     */
    public static function NPUE(): VatRate
    {
        return self::fromCode('NPUE');
    }

    /**
     * Creates the VatRate of "VAT rozlicza nabywca"
     *
     * @return VatRate
     */
    public static function VAT_BUYER(): VatRate
    {
        return self::fromCode('VAT_BUYER');
    }

    /**
     * Creates the VatRate of "zw."
     *
     * @return VatRate
     */
    public static function ZW(): VatRate
    {
        return self::fromCode('ZW');
    }
}
