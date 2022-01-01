<?php

namespace Webit\WFirmaSDK\Goods;

use Webit\WFirmaSDK\Vat\VatCodeId;
use Webit\WFirmaSDK\Vat\VatRateCode;

/**
 * Represents the price of the Good
 */
final class Price
{
    /** @var ?float */
    private $netPrice;

    /** @var ?float */
    private $grossPrice;

    /** @var ?VatRateCode */
    private $vat;

    /** @var PriceType */
    private $priceType;

    /** @var bool */
    private $discount;

    /** @var ?VatCodeId */
    private $vatCodeId;

    /**
     * @param ?float $netPrice
     * @param ?float $grossPrice
     * @param ?VatRateCode $vat
     * @param PriceType $priceType
     * @param bool $discount
     * @param ?VatCodeId $vatCodeId
     * @internal To be used by Good class only. To obtain an instance use named constructors (createFrom...)
     *
     */
    public function __construct(
        ?float $netPrice,
        ?float $grossPrice,
        ?VatRateCode $vat,
        PriceType $priceType,
        bool $discount,
        ?VatCodeId $vatCodeId = null
    ) {
        $this->netPrice = $netPrice;
        $this->grossPrice = $grossPrice;
        $this->vat = $vat;
        $this->priceType = $priceType;
        $this->discount = $discount;
        $this->vatCodeId = $vatCodeId;
    }

    /**
     * A named constructor using net price and VatRateCode
     *
     * @param float $netPrice
     * @param VatRateCode $vat
     * @param bool $discount
     * @return Price
     */
    public static function createFromNetPrice(float $netPrice, VatRateCode $vat, bool $discount = false): Price
    {
        return new self(
            $netPrice,
            null,
            $vat,
            PriceType::netto(),
            $discount
        );
    }

    /**
     * A named constructor using gross price and VatRateCode
     *
     * @param float $grossPrice
     * @param VatRateCode $vat
     * @param bool $discount
     * @return Price
     */
    public static function createFromGrossPrice(float $grossPrice, VatRateCode $vat, bool $discount = false): Price
    {
        return new self(
            null,
            $grossPrice,
            $vat,
            PriceType::brutto(),
            $discount
        );
    }

    /**
     * A named constructor using gross price and VatCodeId
     *
     * @param float $netPrice
     * @param VatCodeId $vatCodeId
     * @param bool $discount
     * @return Price
     */
    public static function createFromNetPriceWithVatCode(float $netPrice, VatCodeId $vatCodeId, bool $discount = false): Price
    {
        return new self(
            $netPrice,
            null,
            null,
            PriceType::netto(),
            $discount,
            $vatCodeId
        );
    }

    /**
     * A named constructor using gross price and VatCodeId
     *
     * @param float $grossPrice
     * @param VatCodeId $vatCodeId
     * @param bool $discount
     * @return Price
     */
    public static function createFromGrossPriceWithVatCode(float $grossPrice, VatCodeId $vatCodeId, bool $discount = false): Price
    {
        return new self(
            null,
            $grossPrice,
            null,
            PriceType::brutto(),
            $discount,
            $vatCodeId
        );
    }

    /**
     * @return float
     */
    public function netPrice(): ?float
    {
        return $this->netPrice;
    }

    /**
     * @return float
     */
    public function grossPrice(): ?float
    {
        return $this->grossPrice;
    }

    /**
     * @return ?VatRateCode
     */
    public function vat(): ?VatRateCode
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
     * @param float $netPrice
     * @return Price
     */
    public function withNetPrice(float $netPrice): Price
    {
        return new self($netPrice, null, $this->vat, PriceType::netto(), $this->discount, $this->vatCodeId);
    }

    /**
     * @param float $grossPrice
     * @return Price
     */
    public function withGrossPrice(float $grossPrice): Price
    {
        return new self(null, $grossPrice, $this->vat, PriceType::brutto(), $this->discount, $this->vatCodeId);
    }

    /**
     * @param VatRateCode|null $vat
     * @return Price
     */
    public function withVat(VatRateCode $vat): Price
    {
        $netPrice = $this->priceType == PriceType::netto() ? $this->netPrice : null;
        $grossPrice = $this->priceType == PriceType::netto() ? null : $this->grossPrice;

        return new self($netPrice, $grossPrice, $vat, $this->priceType, $this->discount, null);
    }

    /**
     * @param bool $discount
     * @return Price
     */
    public function withDiscount(bool $discount): Price
    {
        return new self($this->netPrice, $this->grossPrice, $this->vat, $this->priceType, $discount, $this->vatCodeId);
    }

    /**
     * @param VatCodeId $vatCodeId
     * @return Price
     */
    public function withVatCodeId(VatCodeId $vatCodeId): Price
    {
        return new self($this->netPrice, $this->grossPrice, null, $this->priceType, $this->discount, $vatCodeId);
    }
}