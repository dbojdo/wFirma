<?php

namespace Webit\WFirmaSDK\Goods;

use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Tags\TagIds;
use Webit\WFirmaSDK\Vat\VatCodeId;

/**
 * @JMS\XmlRoot("good")
 */
final class Good extends DateAwareEntity
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Groups("response", "request")
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("code")
     * @JMS\Groups("response", "request")
     */
    private $code;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("unit")
     * @JMS\Groups("response", "request")
     */
    private $unit;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("netto")
     * @JMS\Groups({"request", "response"})
     */
    private $netto;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("brutto")
     * @JMS\Groups({"request", "response"})
     */
    private $brutto;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups("response", "request")
     */
    private $type;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("classification")
     * @JMS\Groups("response", "request")
     */
    private $classification;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("discount")
     * @JMS\Groups({"request", "response"})
     */
    private $discount;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @JMS\Groups("response", "request")
     */
    private $description;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("notes")
     * @JMS\Groups({"response"})
     */
    private $notes;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("documents")
     * @JMS\Groups({"response"})
     */
    private $documents;

    /**
     * @var TagIds
     * @JMS\Type("Webit\WFirmaSDK\Tags\TagIds")
     * @JMS\SerializedName("tags")
     * @JMS\Groups({"request", "response"})
     */
    private $tags;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("count")
     * @JMS\Groups({"request", "response"})
     */
    private $count;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("reserved")
     * @JMS\Groups({"response"})
     */
    private $reserved;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("min")
     * @JMS\Groups({"request", "response"})
     */
    private $min;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("max")
     * @JMS\Groups({"request", "response"})
     */
    private $max;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("secure")
     * @JMS\Groups({"request", "response"})
     */
    private $secure;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("visibility")
     * @JMS\Groups({"request", "response"})
     */
    private $visibility;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("warehouse_type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $warehouseType;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("price_type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $priceType;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("vat")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $vat;

    /**
     * @var VatCodeId
     * @JMS\Type("Webit\WFirmaSDK\Vat\VatCodeId")
     * @JMS\SerializedName("vat_code")
     * @JMS\Groups({"response"})
     *
     */
    private $vatCodeId;

    /**
     * @var VatCodeId
     * @JMS\Type("Webit\WFirmaSDK\Vat\VatCodeId")
     * @JMS\SerializedName("vat_code_purchase")
     * @JMS\Groups({"response"})
     */
    private $vatCodePurchaseId;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("weight")
     * @JMS\Groups({"request", "response"})
     */
    private $weight;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("length")
     * @JMS\Groups({"request", "response"})
     */
    private $length;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("width")
     * @JMS\Groups({"request", "response"})
     */
    private $width;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("height")
     * @JMS\Groups({"request", "response"})
     */
    private $height;

    /**
     * @param string $name
     * @param string $unit
     * @param Price $price
     * @param ?string $code
     * @param ?Type $type
     * @param ?string $classification
     * @param ?string $description
     * @param ?Dimensions $dimensions
     */
    public function __construct(
        string $name,
        string $unit,
        Price $price,
        string $code = null,
        Type $type = null,
        string $classification = null,
        string $description = null,
        Dimensions $dimensions = null
    ) {
        $this->name = $name;
        $this->unit = $unit;
        $this->changePrice($price);
        $this->code = $code;
        $this->type = (string)$type;
        $this->classification = $classification;
        $this->description = $description;
        $this->changeDimensions($dimensions ?: new Dimensions());
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|GoodId
     */
    public function id()
    {
        return GoodId::create($this->plainId());
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function code(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function unit(): string
    {
        return $this->unit;
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
     * @return ?Type
     */
    public function type(): ?Type
    {
        return $this->type ? Type::fromString($this->type) : null;
    }

    /**
     * @return string
     */
    public function classification(): string
    {
        return $this->classification;
    }

    /**
     * @return bool
     */
    public function discount(): bool
    {
        return (bool)$this->discount;
    }

    /**
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function visibility(): bool
    {
        return (bool)$this->visibility;
    }

    /**
     * @return ?WarehouseType
     */
    public function warehouseType(): ?WarehouseType
    {
        return $this->warehouseType ? WarehouseType::fromString($this->warehouseType) : null;
    }

    /**
     * @return ?PriceType
     */
    public function priceType(): ?PriceType
    {
        return $this->priceType ? PriceType::fromString($this->priceType) : null;
    }

    /**
     * @return float
     */
    public function vat(): float
    {
        return $this->vat;
    }

    /**
     * @return int
     */
    public function notes()
    {
        return $this->notes;
    }

    /**
     * @return int
     */
    public function documents()
    {
        return $this->documents;
    }

    /**
     * @return TagIds
     */
    public function tags()
    {
        return $this->tags ?: new TagIds();
    }

    /**
     * @return ?VatCodeId
     */
    public function vatCodeId(): ?VatCodeId
    {
        return $this->vatCodeId;
    }

    /**
     * @return ?VatCodeId
     */
    public function vatCodePurchaseId(): ?VatCodeId
    {
        return $this->vatCodePurchaseId;
    }

    /**
     * @return Dimensions
     */
    public function dimensions(): Dimensions
    {
        return new Dimensions($this->weight, $this->length, $this->width, $this->height);
    }

    /**
     * @param Dimensions $dimensions
     */
    public function changeDimensions(Dimensions $dimensions)
    {
        $this->weight = $dimensions->weight();
        $this->length = $dimensions->length();
        $this->width = $dimensions->width();
        $this->height = $dimensions->height();
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param ?string $code
     */
    public function setCode(?string $code = null): void
    {
        $this->code = $code;
    }

    /**
     * @param string $unit
     */
    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

    /**
     * @param Type $type
     */
    public function setType(Type $type): void
    {
        $this->type = (string)$type;
    }

    /**
     * @param ?string $classification
     */
    public function setClassification(?string $classification = null): void
    {
        $this->classification = $classification;
    }

    /**
     * @param ?string $description
     */
    public function setDescription(?string $description = null): void
    {
        $this->description = $description;
    }

    /**
     * @param float $count
     */
    public function setCount(float $count): void
    {
        $this->count = $count;
    }

    /**
     * @param float $reserved
     */
    public function setReserved(float $reserved): void
    {
        $this->reserved = $reserved;
    }

    /**
     * @param float $min
     */
    public function setMin(float $min): void
    {
        $this->min = $min;
    }

    /**
     * @param float $max
     */
    public function setMax(float $max): void
    {
        $this->max = $max;
    }

    /**
     * @param float $secure
     */
    public function setSecure(float $secure): void
    {
        $this->secure = $secure;
    }

    /**
     * @param bool $visibility
     */
    public function setVisibility(bool $visibility): void
    {
        $this->visibility = (int)$visibility;
    }

    /**
     * @return Price
     */
    public function price(): Price
    {
        return new Price($this->netto, $this->brutto, $this->vat, $this->priceType(), $this->discount());
    }

    /**
     * @param Price $price
     */
    public function changePrice(Price $price)
    {
        $this->netto = $price->netto();
        $this->brutto = $price->brutto();
        $this->vat = $price->vat();
        $this->discount = $price->isDiscount();
        $this->priceType = (string)$price->priceType();
    }
}