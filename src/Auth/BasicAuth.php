<?php

namespace Webit\WFirmaSDK\Auth;

/**
 * @deprecated
 */
final class BasicAuth implements Auth
{
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var int */
    private $companyId;

    /**
     * @param string $username
     * @param string $password
     * @param null $companyId
     */
    public function __construct($username, $password, $companyId = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->companyId = $companyId;
    }

    /**
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function password()
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function companyId()
    {
        return $this->companyId;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return ! ($this->username || $this->password);
    }

    /**
     * @return string
     */
    public function toHttpHeader()
    {
        return sprintf(
            'Authorization: Basic %s',
            base64_encode($this->username().':'.$this->password())
        );
    }
}