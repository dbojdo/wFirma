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

    private function __construct(?int $id = null, ?string $label = null, ?float $rate = null, ?string $code = null, ?Type $type = null, ?int $priority = null, ?DeclarationCountryId $declarationCountryId = null)
    {
        $this->id = $id;
        $this->label = $label;
        $this->rate = $rate;
        $this->code = $code;
        $this->type = $type;
        $this->priority = $priority;
        $this->declarationCountryId = $declarationCountryId;
        $this->periods = [];
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

    public static function VAT23(): self {
        return new VatCode(222, '23%', 23.0, '23', Type::standard(), 13, DeclarationCountryId::Poland());
    }

    public static function VAT22(): self {
        return new VatCode(225, '22%', 22.0, '22', Type::standard(), 12, DeclarationCountryId::Poland());
    }

    public static function VAT8(): self {
        return new VatCode(223, '8%', 8.0, '8', Type::reduced(), 11, DeclarationCountryId::Poland());
    }

    public static function VAT7(): self {
        return new VatCode(226, '7%', 7.0, '7', Type::reduced(), 10, DeclarationCountryId::Poland());
    }

    public static function VAT5(): self {
        return new VatCode(224, '5%', 5.0, '5', Type::reduced(), 9, DeclarationCountryId::Poland());
    }

    public static function VAT3(): self {
        return new VatCode(227, '3%', 3.0, '3', Type::reduced(), 8, DeclarationCountryId::Poland());
    }

    public static function ZW(): self {
        return new VatCode(233, 'zw.', 0.0, 'ZW', Type::other(), 7, DeclarationCountryId::Poland());
    }

    public static function NPUE(): self {
        return new VatCode(231, 'nie podl. UE', 0.0, 'NPUE', Type::other(), 6, DeclarationCountryId::Poland());
    }

    public static function NP(): self {
        return new VatCode(230, 'nie podl.', 0.0, 'NP', Type::other(), 5, DeclarationCountryId::Poland());
    }

    public static function VAT_BUYER(): self {
        return new VatCode(232, 'VAT rozlicza nabywca', 0.0, 'VAT_BUYER', Type::other(), 4, DeclarationCountryId::Poland());
    }

    public static function WDT(): self {
        return new VatCode(228, '0% WDT', 0.0, 'WDT', Type::other(), 3, DeclarationCountryId::Poland());
    }

    public static function EXP(): self {
        return new VatCode(229, '0% Exp.', 0.0, 'EXP', Type::other(), 2, DeclarationCountryId::Poland());
    }

    public static function VAT0(): self {
        return new VatCode(234, '0%', 0.0, '0', Type::other(), 1, DeclarationCountryId::Poland());
    }
}
