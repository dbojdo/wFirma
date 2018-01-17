<?php

namespace Webit\WFirmaSDK\Invoices;

final class Discount
{
    /** @var float */
    private $percent;

    /** @var float */
    private $amount;

    /**
     * @param float $percent
     * @param float $amount
     */
    public function __construct($percent, $amount)
    {
        $this->percent = $percent;
        $this->amount = $amount;
    }

    /**
     * @param float $amount
     * @return Discount
     */
    public static function amountDiscount($amount)
    {
        return new self(null, $amount);
    }

    /**
     * @param float $percent
     * @return Discount
     */
    public static function percentDiscount($percent)
    {
        return new self($percent, null);
    }

    public function amount()
    {
        return $this->amount;
    }

    public function percent()
    {
        return $this->percent;
    }
}