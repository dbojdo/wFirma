<?php

namespace Webit\WFirmaSDK\Invoices;

use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("company_detail")
 */
final class CompanyDetail extends DateAwareEntity
{
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
     * @JMS\SerializedName("altname")
     * @JMS\Groups({"response"})
     */
    private $altName;

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
     * @JMS\SerializedName("street")
     * @JMS\Groups({"response"})
     */
    private $street;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("building_number")
     * @JMS\Groups({"response"})
     */
    private $buildingNumber;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("flat_number")
     * @JMS\Groups({"response"})
     */
    private $flatNumber;

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
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("bank_name")
     * @JMS\Groups({"response"})
     */
    private $bankName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("bank_account")
     * @JMS\Groups({"response"})
     */
    private $bankAccount;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("bank_swift")
     * @JMS\Groups({"response"})
     */
    private $bankSwift;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("bank_address")
     * @JMS\Groups({"response"})
     */
    private $bankAddress;

    private function __construct()
    {
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|CompanyDetailId
     */
    public function id()
    {
        return CompanyDetailId::create($this->plainId());
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
    public function altName()
    {
        return $this->altName;
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
    public function buildingNumber()
    {
        return $this->buildingNumber;
    }

    /**
     * @return string
     */
    public function flatNumber()
    {
        return $this->flatNumber;
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
     * @return string
     */
    public function bankName()
    {
        return $this->bankName;
    }

    /**
     * @return string
     */
    public function bankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @return string
     */
    public function bankSwift()
    {
        return $this->bankSwift;
    }

    /**
     * @return string
     */
    public function bankAddress()
    {
        return $this->bankAddress;
    }
}