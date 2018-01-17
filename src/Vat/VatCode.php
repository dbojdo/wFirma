<?php

namespace Webit\WFirmaSDK\Vat;

use Webit\WFirmaSDK\DeclarationCountries\DeclarationCountryId;
use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;

final class VatCode extends DateAwareEntity
{
    /**
     * @var DeclarationCountryId
     * @JMS\Type("Webit\WFirmaSDK\DeclarationCountries\DeclarationCountryId")
     * @JMS\SerializedName("declaration_country")
     * @JMS\Groups({"response"})
     */
    private $declarationCountryId;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("label")
     * @JMS\Groups({"response"})
     */
    private $label;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("rate")
     * @JMS\Groups({"response"})
     */
    private $rate;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("code")
     * @JMS\Groups({"response"})
     */
    private $code;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @JMS\Groups({"response"})
     */
    private $type;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("priority")
     * @JMS\Groups({"response"})
     */
    private $priority;

    /**
     * @var VatCodePeriod[]
     * @JMS\Type("array<Webit\WFirmaSDK\Vat\VatCodePeriod>")
     * @JMS\SerializedName("vat_code_periods")
     * @JMS\XmlList(entry="vat_code_period")
     * @JMS\Groups({"response"})
     */
    private $periods;

    private function __construct()
    {
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|VatCodeId
     */
    public function id()
    {
        return VatCodeId::create($this->plainId());
    }

    /**
     * @return DeclarationCountryId
     */
    public function declarationCountryId()
    {
        return $this->declarationCountryId;
    }

    /**
     * @return string
     */
    public function label()
    {
        return $this->label;
    }

    /**
     * @return float
     */
    public function rate()
    {
        return $this->rate;
    }

    /**
     * @return string
     */
    public function code()
    {
        return $this->code;
    }

    /**
     * @return Type
     */
    public function type()
    {
        return $this->type ? Type::fromString($this->type) : null;
    }

    /**
     * @return int
     */
    public function priority()
    {
        return $this->priority;
    }

    /**
     * @return VatCodePeriod[]
     */
    public function periods()
    {
        return $this->periods ?: array();
    }
}
