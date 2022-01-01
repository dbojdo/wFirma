<?php

namespace Webit\WFirmaSDK\Goods;

use Webit\WFirmaSDK\Vat\VatCodeId;
use Webit\WFirmaSDK\Vat\VatPlRate;

final class Price
{
    /** @var ?float */
    private $netto;

    /** @var ?float */
    private $brutto;

    /** @var ?VatPlRate */
    private $vat;

    /** @var PriceType */
    private $priceType;

    /** @var bool */
    private $discount;

    /** @var ?VatCodeId */
    private $vatCodeId;

    /**
     * @internal To be used by Good class only. To obtain an instance use named constructors (createFrom...)
     *
     * @param ?float $netto
     * @param ?float $brutto
     * @param ?VatPlRate $vat
     * @param PriceType $priceType
     * @param bool $discount
     * @param ?VatCodeId $vatCodeId
     */
    public function __construct(
        ?float $netto,
        ?float $brutto,
        ?VatPlRate $vat,
        PriceType $priceType,
        bool $discount,
        ?VatCodeId $vatCodeId = null
    ) {
        $this->netto = $netto;
        $this->brutto = $brutto;
        $this->vat = $vat;
        $this->priceType = $priceType;
        $this->discount = $discount;
        $this->vatCodeId = $vatCodeId;
    }

    public static function createFromNetto(float $netto, VatPlRate $vat, bool $discount = false): Price
    {
        return new self(
            $netto,
            null,
            $vat,
            PriceType::netto(),
            $discount
        );
    }

    public static function createFromBrutto(float $brutto, VatPlRate $vat, bool $discount = false): Price
    {
        return new self(
            null,
            $brutto,
            $vat,
            PriceType::brutto(),
            $discount
        );
    }

    public static function createFromNettoWithVatCode(float $netto, VatCodeId $vatCodeId, bool $discount = false): Price
    {
        return new self(
            $netto,
            null,
            null,
            PriceType::netto(),
            $discount,
            $vatCodeId
        );
    }

    public static function createFromBruttoWithVatCode(float $brutto, VatCodeId $vatCodeId, bool $discount = false): Price
    {
        return new self(
            null,
            $brutto,
            null,
            PriceType::brutto(),
            $discount,
            $vatCodeId
        );
    }

    /**
     * @return float
     */
    public function netto(): ?float
    {
        return $this->netto;
    }

    /**
     * @return float
     */
    public function brutto(): ?float
    {
        return $this->brutto;
    }

    /**
     * @return ?VatPlRate
     */
    public function vat(): ?VatPlRate
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

    /**
     * @return ?VatCodeId
     */
    public function vatCodeId(): ?VatCodeId
    {
        return $this->vatCodeId;
    }

    /**
     * @param float $netto
     * @return Price
     */
    public function withNetto(float $netto): Price
    {
        return new self($netto, null, $this->vat, PriceType::netto(), $this->discount, $this->vatCodeId);
    }

    /**
     * @param float $brutto
     * @return Price
     */
    public function withBrutto(float $brutto): Price
    {
        return new self(null, $brutto, $this->vat, PriceType::brutto(), $this->discount, $this->vatCodeId);
    }

    /**
     * @param VatPlRate|null $vat
     * @return Price
     */
    public function withVat(VatPlRate $vat): Price
    {
        $netto = $this->priceType == PriceType::netto() ? $this->netto : null;
        $brutto = $this->priceType == PriceType::netto() ? null : $this->brutto;

        return new self($netto, $brutto, $vat, $this->priceType, $this->discount, null);
    }

    /**
     * @param bool $discount
     * @return Price
     */
    public function withDiscount(bool $discount): Price
    {
        return new self($this->netto, $this->brutto, $this->vat, $this->priceType, $discount, $this->vatCodeId);
    }

    /**
     * @param VatCodeId $vatCodeId
     * @return Price
     */
    public function withVatCodeId(VatCodeId $vatCodeId): Price
    {
        return new self($this->netto, $this->brutto, null, $this->priceType, $this->discount, $vatCodeId);
    }
}