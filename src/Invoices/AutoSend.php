<?php

namespace Webit\WFirmaSDK\Invoices;

final class AutoSend
{
    /** @var bool */
    private $email;

    /** @var bool */
    private $postivo;

    /** @var bool */
    private $sms;

    /**
     * @param bool $email
     * @param bool $postivo
     * @param bool $sms
     */
    public function __construct($email = false, $postivo = false, $sms = false)
    {
        $this->email = (bool)$email;
        $this->postivo = (bool)$postivo;
        $this->sms = (bool)$sms;
    }

    /**
     * @return bool
     */
    public function isEmailEnabled()
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function isPostivoEnabled()
    {
        return $this->postivo;
    }

    /**
     * @return bool
     */
    public function isSmsEnabled()
    {
        return $this->sms;
    }
}