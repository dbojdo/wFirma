<?php

namespace Webit\WFirmaSDK\Contractors;

final class ContactAddress
{
    /** @var string */
    private $name;

    /** @var string */
    private $street;

    /** @var string */
    private $zip;

    /** @var string */
    private $city;

    /** @var string */
    private $country;

    /** @var string */
    private $person;

    /**
     * @param string $name
     * @param string $street
     * @param string $zip
     * @param string $city
     * @param string $country
     * @param string $person
     */
    public function __construct(
        $name = null,
        $street = null,
        $zip = null,
        $city = null,
        $country = null,
        $person = null
    ) {
        $this->name = $name;
        $this->street = $street;
        $this->zip = $zip;
        $this->city = $city;
        $this->country = $country;
        $this->person = $person;
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
    public function person()
    {
        return $this->person;
    }
}