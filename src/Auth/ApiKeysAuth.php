<?php

namespace Webit\WFirmaSDK\Auth;

final class ApiKeysAuth implements Auth
{
    /** @var string */
    private $accessKey;

    /** @var string */
    private $secretKey;

    /** @var string */
    private $appKey;

    /** @var null|int */
    private $companyId;

    public function __construct($accessKey, $secretKey, $appKey, $companyId = null)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        $this->appKey = $appKey;
        $this->companyId = $companyId;
    }

    /**
     * @return string
     */
    public function accessKey()
    {
        return $this->accessKey;
    }

    /**
     * @return string
     */
    public function secretKey()
    {
        return $this->secretKey;
    }

    /**
     * @return string
     */
    public function appKey()
    {
        return $this->appKey;
    }

    /**
     * @return int|null
     */
    public function companyId()
    {
        return $this->companyId;
    }
}
