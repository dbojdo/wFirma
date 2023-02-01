<?php

namespace Webit\WFirmaSDK\Auth;

/**
 * @deprecated this method is deprecated, and it won't be supported by wFirma anymore. Use ApiKeyAuth instead.
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
     * @return null|int
     */
    public function companyId(): ?int
    {
        return $this->companyId;
    }
}
