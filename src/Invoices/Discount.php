<?php

namespace Webit\WFirmaSDK\Invoices;

final class Discount
{
    /** @var float */
    private $percent;

    /**
     * @param float $percent
     * @param float $amount
     */
    public function __construct($percent)
    {
        $this->percent = $percent;
    }

    /**
     * @param float $percent
     * @return Discount
     */
    public static function percentDiscount($percent)
    {
        return new self($percent);
    }

    public function percent()
    {
        return $this->percent;
    }
}
