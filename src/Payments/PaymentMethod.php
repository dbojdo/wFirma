<?php

namespace Webit\WFirmaSDK\Payments;

final class PaymentMethod
{
    /** @var string */
    private $method;

    /**
     * @param string $method
     */
    private function __construct($method)
    {
        $this->method = strtolower($method);
    }

    /**
     * @return PaymentMethod
     */
    public static function cash()
    {
        return new self('cash');
    }

    /**
     * @return PaymentMethod
     */
    public static function transfer()
    {
        return new self('transfer');
    }

    /**
     * @return PaymentMethod
     */
    public static function compensation()
    {
        return new self('compensation');
    }

    /**
     * @return PaymentMethod
     */
    public static function cod()
    {
        return new self('cod');
    }

    /**
     * @return PaymentMethod
     */
    public static function paymentCard()
    {
        return new self('payment_card');
    }

    /**
     * @param string $method
     * @return PaymentMethod
     * @internal
     */
    public static function fromString($method)
    {
        return new self($method);
    }

    public function __toString()
    {
        return $this->method;
    }
}