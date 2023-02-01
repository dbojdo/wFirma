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

    public function __construct(string $accessKey, string $secretKey, string $appKey, ?int $companyId = null)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        $this->appKey = $appKey;
        $this->companyId = $companyId;
    }

    public function accessKey(): string
    {
        return $this->accessKey;
    }

    public function secretKey(): string
    {
        return $this->secretKey;
    }

    public function appKey(): string
    {
        return $this->appKey;
    }

    public function companyId(): ?int
    {
        return $this->companyId;
    }
}
