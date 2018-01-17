<?php

namespace Webit\WFirmaSDK\Invoices;

final class PaymentState
{
    /** @var string */
    private $state;

    /**
     * @param string $state
     */
    private function __construct($state)
    {
        $this->state = strtolower($state);
    }

    /**
     * @return PaymentState
     */
    public static function paid()
    {
        return new self('paid');
    }

    /**
     * @return PaymentState
     */
    public static function unpaid()
    {
        return new self('unpaid');
    }

    /**
     * @return PaymentState
     */
    public static function undefined()
    {
        return new self('undefined');
    }

    /**
     * @param string $status
     * @return PaymentState
     * @internal
     */
    public static function fromString($status)
    {
        return new self($status);
    }

    public function __toString()
    {
        return $this->state;
    }
}