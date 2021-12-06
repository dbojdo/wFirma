<?php

namespace Webit\WFirmaSDK\Invoices;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\DateAwareEntity;
use Webit\WFirmaSDK\Goods\GoodId;

/**
 * @JMS\XmlRoot("invoicecontent")
 */
final class InvoicesContent extends DateAwareEntity
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("classification")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $classification;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("unit")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $unit;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("count")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $count;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("price")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $price;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("discount")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $discount;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("discount_percent")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $discountPercent;

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
     * @JMS\SerializedName("discount")
     * @JMS\Groups({"request", "response"})
     */
    private $brutto;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("vat")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $vat;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("lumpcode")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $lumpcode;

    /**
     * @var GoodId
     * @JMS\Type("Webit\WFirmaSDK\Goods\GoodId")
     * @JMS\SerializedName("good")
     * @JMS\Groups({"request", "response"})
     */
    private $goodId;

    /**
     * @param string $name
     * @param string $vat
     * @param string $unit
     * @param float $count
     * @param float $price
     * @param GoodId|null $good
     * @param Discount|null $discount
     * @param string $lumpcode
     * @param string $classification
     */
    private function __construct(
        $name,
        $vat,
        $unit,
        $count,
        $price,
        GoodId $good = null,
        Discount $discount = null,
        $lumpcode,
        $classification = null
    ) {
        $this->name = $name;
        $this->classification = $classification;
        $this->unit = $unit;
        $this->count = $count;
        $this->price = $price;
        $this->discount = $discount ? $discount->amount() : null;
        $this->discountPercent = $discount ? $discount->percent() : null;
        $this->vat = $vat;
        $this->lumpcode = $lumpcode;
        $this->goodId = $good;
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|InvoiceContentId
     */
    public function id()
    {
        return InvoiceContentId::create($this->plainId());
    }

    /**
     * @param GoodId $id
     * @param float $count
     * @param float $price
     * @param Discount|null $discount
     * @param string $vat
     * @param string $lumpcode
     * @return InvoicesContent
     */
    public static function fromGoodId(GoodId $id, $count, $price, $vat, Discount $discount = null, $lumpcode = null)
    {
        return new self(
            null,
            $vat,
            null,
            $count,
            $price,
            $id,
            $discount,
            $lumpcode
        );
    }

    /**
     * @param string $name
     * @param string $unit
     * @param float $count
     * @param float $price
     * @param string $vat
     * @param Discount|null $discount
     * @param string $lumpcode
     * @param string $classification
     * @return InvoicesContent
     */
    public static function fromName(
        $name,
        $unit,
        $count,
        $price,
        $vat,
        Discount $discount = null,
        $lumpcode = null,
        $classification = null
    ) {
        return new self(
            $name,
            $vat,
            $unit,
            $count,
            $price,
            null,
            $discount,
            $lumpcode,
            $classification
        );
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function classification()
    {
        return $this->classification;
    }

    /**
     * @return string
     */
    public function unit()
    {
        return $this->unit;
    }

    /**
     * @return float
     */
    public function count()
    {
        return $this->count;
    }

    /**
     * @return float
     */
    public function price()
    {
        return $this->price;
    }

    /**
     * @return Discount|null
     */
    public function discount()
    {
        if ($this->discount) {
            return Discount::amountDiscount($this->discount);
        }

        if ($this->discountPercent) {
            return Discount::percentDiscount($this->discountPercent);
        }

        return null;
    }

    /**
     * @return float
     */
    public function netto()
    {
        return $this->netto;
    }

    /**
     * @return float
     */
    public function brutto()
    {
        return $this->brutto;
    }

    /**
     * @return string
     */
    public function vat()
    {
        return $this->vat;
    }

    /**
     * @return string
     */
    public function lumpcode()
    {
        return $this->lumpcode;
    }

    /**
     * @return GoodId
     */
    public function goodId()
    {
        return $this->goodId;
    }
}
