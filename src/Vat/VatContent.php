<?php

namespace Webit\WFirmaSDK\Vat;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\DateAwareEntity;

/**
 * @JMS\XmlRoot("vat_content")
 */
final class VatContent extends DateAwareEntity
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("object_name")
     * @JMS\Groups({"response"})
     */
    private $objectName;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("object_id")
     * @JMS\Groups({"response"})
     */
    private $objectId;

    /**
     * @var VatCodeId
     * @JMS\Type("\Webit\WFirmaSDK\Vat\VatCodeId")
     * @JMS\SerializedName("modified")
     * @JMS\Groups({"request", "response"})
     */
    private $vatCodeId;

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
     * @JMS\SerializedName("tax")
     * @JMS\Groups({"request", "response"})
     */
    private $tax;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("brutto")
     * @JMS\Groups({"request", "response"})
     */
    private $brutto;

    private function __construct()
    {
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|VatContentId
     */
    public function id()
    {
        return VatContentId::create($this->plainId());
    }

    /**
     * @return string
     */
    public function objectName()
    {
        return $this->objectName;
    }

    /**
     * @return int
     */
    public function objectId()
    {
        return $this->objectId;
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
    public function tax()
    {
        return $this->tax;
    }

    /**
     * @return float
     */
    public function brutto()
    {
        return $this->brutto;
    }

    /**
     * @return VatCodeId
     */
    public function vatCodeId()
    {
        return $this->vatCodeId;
    }
}
