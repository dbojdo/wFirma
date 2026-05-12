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

    public function isDiscount()
    {
        return $this->percent > 0;
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
