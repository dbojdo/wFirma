<?php

namespace Webit\WFirmaSDK\Contractors;

final class InvoiceAddress
{
    /** @var string */
    private $street;

    /** @var string */
    private $zip;

    /** @var string */
    private $city;

    /** @var string */
    private $country;

    /**
     * @param string $street
     * @param string $zip
     * @param string $city
     * @param string $country
     */
    public function __construct($street = null, $zip = null, $city = null, $country = null)
    {
        $this->street = $street;
        $this->zip = $zip;
        $this->city = $city;
        $this->country = $country;
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
}