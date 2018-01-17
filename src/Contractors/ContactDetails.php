<?php

namespace Webit\WFirmaSDK\Contractors;

final class ContactDetails
{
    /** @var string */
    private $phone;

    /** @var string */
    private $skype;

    /** @var string */
    private $fax;

    /** @var string */
    private $email;

    /** @var string */
    private $url;

    /**
     * @param string $phone
     * @param string $skype
     * @param string $fax
     * @param string $email
     * @param string $url
     */
    public function __construct($phone = null, $skype = null, $fax = null, $email = null, $url = null)
    {
        $this->phone = $phone;
        $this->skype = $skype;
        $this->fax = $fax;
        $this->email = $email;
        $this->url = $url;
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
    public function skype()
    {
        return $this->skype;
    }

    /**
     * @return string
     */
    public function fax()
    {
        return $this->fax;
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
    public function url()
    {
        return $this->url;
    }
}
