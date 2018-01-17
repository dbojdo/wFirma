<?php

namespace Webit\WFirmaSDK\Contractors;

use Webit\WFirmaSDK\Invoices\PaymentMethod;

final class PaymentSettings
{
    /** @var int */
    private $days;

    /** @var PaymentMethod */
    private $method;

    /** @var float */
    private $discountPercent;

    /** @var bool */
    private $remind;

    /**
     * @param int $days
     * @param PaymentMethod $method
     * @param float $discountPercent
     * @param bool $remind
     */
    public function __construct($days = null, PaymentMethod $method = null, $discountPercent = null, $remind = false)
    {
        $this->days = $days;
        $this->method = $method;
        $this->discountPercent = $discountPercent;
        $this->remind = $remind;
    }

    /**
     * @return int
     */
    public function days()
    {
        return $this->days;
    }

    /**
     * @return PaymentMethod
     */
    public function method()
    {
        return $this->method;
    }

    /**
     * @return float
     */
    public function discountPercent()
    {
        return $this->discountPercent;
    }

    /**
     * @return bool
     */
    public function remind()
    {
        return (bool)$this->remind;
    }
}