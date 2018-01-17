<?php

namespace Webit\WFirmaSDK\CompanyAccounts;

use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;

final class CompanyAccount extends DateAwareEntity
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Groups({"request", "response"})
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("bank_name")
     * @JMS\Groups({"request", "response"})
     */
    private $bankName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("number")
     * @JMS\Groups({"request", "response"})
     */
    private $number;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("swift")
     * @JMS\Groups({"request", "response"})
     */
    private $swift;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     * @JMS\Groups({"request", "response"})
     */
    private $address;

    private function __construct()
    {
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|CompanyAccountId
     */
    public function id()
    {
        return CompanyAccountId::create($this->plainId());
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
    public function bankName()
    {
        return $this->bankName;
    }

    /**
     * @return string
     */
    public function number()
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function swift()
    {
        return $this->swift;
    }

    /**
     * @return string
     */
    public function address()
    {
        return $this->address;
    }

    /**
     * @param string $name
     */
    public function changeName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $bankName
     */
    public function changeBankName($bankName)
    {
        $this->bankName = $bankName;
    }

    /**
     * @param string $number
     */
    public function changeNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @param string $swift
     */
    public function changeSwift($swift)
    {
        $this->swift = $swift;
    }

    /**
     * @param string $address
     */
    public function changeAddress($address)
    {
        $this->address = $address;
    }
}
