<?php

namespace Webit\WFirmaSDK\Invoices;

use Webit\WFirmaSDK\Contractors\Contractor;
use Webit\WFirmaSDK\Contractors\TaxIdType;
use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\EntityId;

/**
 * @JMS\XmlRoot("contractor_detail")
 */
final class ContractorDetail extends DateAwareEntity
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("tax_id_type")
     * @JMS\Groups({"response"})
     */
    private $taxIdType;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Groups({"response"})
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("nip")
     * @JMS\Groups({"response"})
     */
    private $nip;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"response"})
     */
    private $street;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("zip")
     * @JMS\Groups({"response"})
     */
    private $zip;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     * @JMS\Groups({"response"})
     */
    private $city;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     * @JMS\Groups({"response"})
     */
    private $country;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     * @JMS\Groups({"response"})
     */
    private $phone;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("email")
     * @JMS\Groups({"response"})
     */
    private $email;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("discount_percent")
     * @JMS\Groups({"response"})
     */
    private $discountPercent;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("empty")
     * @JMS\Groups({"response"})
     */
    private $empty;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("simple")
     * @JMS\Groups({"simple"})
     */
    private $simple;

    private function __construct()
    {
    }

    /**
     * @return null|EntityId|ContractorDetailId
     */
    public function id()
    {
        return ContractorDetailId::create($this->plainId());
    }

    /**
     * @return string
     */
    public function taxIdType()
    {
        return $this->taxIdType ? TaxIdType::fromString($this->taxIdType) : null;
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
    public function nip()
    {
        return $this->nip;
    }

    /**
     * @return string
     */
    public function street()
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function zip()
    {
        return $this->zip;
    }

    /**
     * @return string
     */
    public function city()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function country()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function phone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function email()
    {
        return $this->email;
    }

    /**
     * @return float
     */
    public function discountPercent()
    {
        return $this->discountPercent;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return (bool)$this->empty;
    }

    /**
     * @return bool
     */
    public function isSimple()
    {
        return (bool)$this->simple;
    }

    /**
     * @param Contractor $contractor
     * @return ContractorDetail
     */
    public static function fromContractor(Contractor $contractor)
    {
        $detail = new self();
        $detail->updateWith($contractor);

        return $detail;
    }

    /**
     * @param Contractor $contractor
     */
    public function updateWith(Contractor $contractor)
    {
        $this->taxIdType = $contractor->taxIdType();
        $this->name = $contractor->name();
        $this->nip = $contractor->nip();
        $this->street = $contractor->invoiceAddress()->street();
        $this->zip = $contractor->invoiceAddress()->zip();
        $this->city = $contractor->invoiceAddress()->city();
        $this->country = $contractor->invoiceAddress()->country();
        $this->phone = $contractor->contactDetails()->phone();
        $this->email = $contractor->contactDetails()->email();
        $this->discountPercent = $contractor->paymentSettings()->discountPercent();
    }
}