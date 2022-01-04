<?php

namespace Webit\WFirmaSDK\Goods;

use Webit\WFirmaSDK\Vat\VatCodeId;
use Webit\WFirmaSDK\Vat\VatRate;

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

    /** @var VatRate */
    private $vatRate;

    /** @var VatCodeId */
    private $vatCodePurchaseId;

    /**
     * @param ?float $netPrice
     * @param ?float $grossPrice
     * @param PriceType $priceType
     * @param VatRate $vatRate
     * @param bool $discount
     * @param ?VatCodeId $vatCodePurchaseId
     * @internal To be used by Good class only. To obtain an instance use named constructors (createFrom...)
     */
    public function __construct(
        ?float $netPrice,
        ?float $grossPrice,
        PriceType $priceType,
        VatRate $vatRate,
        bool $discount = false,
        ?VatCodeId $vatCodePurchaseId = null
    ) {
        $this->netPrice = $netPrice !== null ? round($netPrice, 2) : null;
        $this->grossPrice = $grossPrice !== null ? round($grossPrice, 2) : null;
        $this->priceType = $priceType;
        $this->discount = $discount;
        $this->vatRate = $vatRate;
        $this->vatCodePurchaseId = $vatCodePurchaseId ?: ($vatRate->vatCodeId() ?: null);
    }

    /**
     * A named constructor using net price
     *
     * @param float $netPrice
     * @param VatRate $vatRate
     * @param bool $discount
     * @param ?VatCodeId $vatCodePurchaseId
     * @return Price
     */
    public static function createFromNetPrice(float $netPrice, VatRate $vatRate, bool $discount = false, ?VatCodeId $vatCodePurchaseId = null): Price
    {
        return new self(
            $netPrice,
            null,
            PriceType::netto(),
            $vatRate,
            $discount,
            $vatCodePurchaseId
        );
    }

    /**
     * A named constructor using gross price
     *
     * @param float $grossPrice
     * @param VatRate $vatRate
     * @param bool $discount
     * @param ?VatCodeId $vatCodePurchaseId
     * @return Price
     */
    public static function createFromGrossPrice(float $grossPrice, VatRate $vatRate, bool $discount = false, ?VatCodeId $vatCodePurchaseId = null): Price
    {
        return new self(
            null,
            $grossPrice,
            PriceType::brutto(),
            $vatRate,
            $discount,
            $vatCodePurchaseId
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
     * @return VatRate
     */
    public function vatRate(): VatRate
    {
        return $this->vatRate;
    }

    /**
     * @return VatCodeId
     */
    public function vatCodePurchaseId(): VatCodeId
    {
        return $this->vatCodePurchaseId;
    }

    /**
     * @param float $netPrice
     * @return Price
     */
    public function withNetPrice(float $netPrice): Price
    {
        return new self($netPrice, null, PriceType::netto(), $this->vatRate, $this->discount, $this->vatCodePurchaseId);
    }

    /**
     * @param float $grossPrice
     * @return Price
     */
    public function withGrossPrice(float $grossPrice): Price
    {
        return new self(null, $grossPrice, PriceType::brutto(), $this->vatRate, $this->discount, $this->vatCodePurchaseId);
    }

    /**
     * @param bool $discount
     * @return Price
     */
    public function withDiscount(bool $discount): Price
    {
        return new self($this->netPrice, $this->grossPrice, $this->priceType, $this->vatRate, $discount, $this->vatCodePurchaseId);
    }

    /**
     * @param VatRate $vatRate
     * @return Price
     */
    public function withVatCodeId(VatRate $vatRate): Price
    {
        return new self($this->netPrice, $this->grossPrice, $this->priceType, $vatRate, $this->discount, $this->vatCodePurchaseId);
    }

    /**
     * @param VatCodeId $vatCodePurchaseId
     * @return Price
     */
    public function withVatCodePurchaseId(VatCodeId $vatCodePurchaseId): Price
    {
        return new self($this->netPrice, $this->grossPrice, $this->priceType, $this->vatRate, $this->discount, $vatCodePurchaseId);
    }
}
