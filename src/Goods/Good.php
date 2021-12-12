<?php

namespace Webit\WFirmaSDK\Goods;

use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Module;

/**
 * @JMS\XmlRoot("good")
 */
final class Good extends DateAwareEntity
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Groups("response", "addRequest")
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("code")
     * @JMS\Groups("response", "addRequest")
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
     * @JMS\SerializedName("discount")
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
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("discount")
     * @JMS\XmlElement(cdata=false)
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
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("price_type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $priceType;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("vat")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $vat;

    /**
     * @param string $name
     * @param string $unit
     * @param string $vat
     * @param string $code
     * @param float  $netto
     * @param float  $brutto
     * @param string $type
     * @param string $classification
     * @param float  $discount
     * @param string $description
     * @param string $priceType
     */
    public function __construct(
        string $name,
        string $unit,
        string $vat,
        string $code = null,
        float $netto = null,
        float $brutto = null,
        string $type = null,
        string $classification = null,
        float $discount = null,
        string $description = null,
        string $priceType = null
    )
    {
        $this->name = $name;
        $this->unit = $unit;
        $this->vat = $vat;
        $this->code = $code;
        $this->netto = $netto;
        $this->brutto = $brutto;
        $this->type = $type;
        $this->classification = $classification;
        $this->discount = $discount;
        $this->description = $description;
        $this->priceType = $priceType;
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
    public function getBrutto(): float
    {
        return $this->brutto;
    }

    /**
     * @return string
     */
    public function type(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function classification(): string
    {
        return $this->classification;
    }

    /**
     * @return float
     */
    public function discount(): float
    {
        return $this->discount;
    }

    /**
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function priceType(): string
    {
        return $this->priceType;
    }

    /**
     * @return string
     */
    public function vat(): string
    {
        return $this->vat;
    }
}