<?php

namespace Webit\WFirmaSDK\Goods;

final class Price
{
    private $netto;

    private $brutto;

    private $vat;

    private $priceType;

    private $discount;

    /**
     * @internal To be used by Good class only. To obtain an instance use named constructors (createFrom...)
     *
     * @param float $netto
     * @param float $brutto
     * @param ?int $vat
     * @param PriceType $priceType
     */
    public function __construct(float $netto, float $brutto, ?int $vat, PriceType $priceType, bool $discount)
    {
        $this->netto = $netto;
        $this->brutto = $brutto;
        $this->vat = $vat;
        $this->priceType = $priceType;
        $this->discount = $discount;
    }

    /**
     * @return float
     */
    public function netto(): float
    {
        return $this->netto;
    }

    /**
     * @return float
     */
    public function brutto(): float
    {
        return $this->brutto;
    }

    /**
     * @return int
     */
    public function vat(): int
    {
        return $this->vat;
    }

    /**
     * @return PriceType
     */
    public function priceType(): PriceType
    {
        return $this->priceType;
    }

    /**
     * @return bool
     */
    public function isDiscount(): bool
    {
        return $this->discount;
    }

    public static function createFromNetto(float $netto, int $vat, bool $discount = false): Price
    {
        return new self(
            $netto,
            $netto * self::vatRatio($vat),
            $vat,
            PriceType::netto(),
            $discount
        );
    }

    public static function createFromBrutto(float $brutto, int $vat, bool $discount = false): Price
    {
        return new self(
            $brutto / self::vatRatio($vat),
            $brutto,
            $vat,
            PriceType::netto(),
            $discount
        );
    }

    private static function vatRatio(int $vat): float
    {
        return (100 + $vat) / 100;
    }
}