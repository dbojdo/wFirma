<?php

namespace Webit\WFirmaSDK\Goods;

use Webit\WFirmaSDK\Vat\VatCodeId;

/**
 * Represents the price of the Good
 */
final class Price
{
    /** @var ?float */
    private $netPrice;

    /** @var ?float */
    private $grossPrice;

    /** @var PriceType */
    private $priceType;

    /** @var bool */
    private $discount;

    /** @var ?VatCodeId */
    private $vatCodeId;

    /**
     * @param ?float $netPrice
     * @param ?float $grossPrice
     * @param ?VatCodeId $vat
     * @param PriceType $priceType
     * @param bool $discount
     * @param ?VatCodeId $vatCodeId
     * @internal To be used by Good class only. To obtain an instance use named constructors (createFrom...)
     *
     */
    public function __construct(
        ?float $netPrice,
        ?float $grossPrice,
        ?VatCodeId $vatCodeId,
        PriceType $priceType,
        bool $discount,
    ) {
        $this->netPrice = $netPrice;
        $this->grossPrice = $grossPrice;
        $this->vatCodeId = $vatCodeId;
        $this->priceType = $priceType;
        $this->discount = $discount;
    }

    /**
     * A named constructor using gross price and VatCodeId
     *
     * @param float $netPrice
     * @param VatCodeId $vatCodeId
     * @param bool $discount
     * @return Price
     */
    public static function createFromNetPrice(float $netPrice, VatCodeId $vatCodeId, bool $discount = false): Price
    {
        return new self(
            $netPrice,
            null,
            $vatCodeId,
            PriceType::netto(),
            $discount
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
    public static function createFromGrossPrice(float $grossPrice, VatCodeId $vatCodeId, bool $discount = false): Price
    {
        return new self(
            null,
            $grossPrice,
            $vatCodeId,
            PriceType::brutto(),
            $discount
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
        return new self($netPrice, null, $this->vatCodeId, PriceType::netto(), $this->discount);
    }

    /**
     * @param float $grossPrice
     * @return Price
     */
    public function withGrossPrice(float $grossPrice): Price
    {
        return new self(null, $grossPrice, $this->vatCodeId, PriceType::brutto(), $this->discount);
    }

    /**
     * @param VatCodeId $vatCodeId
     * @return Price
     */
    public function withVatCodeId(VatCodeId $vatCodeId): Price {
        return new self($this->netPrice, $this->grossPrice, $vatCodeId, $this->priceType, $this->discount);
    }

    /**
     * @param bool $discount
     * @return Price
     */
    public function withDiscount(bool $discount): Price
    {
        return new self($this->netPrice, $this->grossPrice, $this->vatCodeId, $this->priceType, $discount);
    }
}
