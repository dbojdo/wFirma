<?php

namespace Webit\WFirmaSDK\Invoices;

final class PaymentCurrency
{
    /** @var bool */
    private $currencyPayment;

    /** @var float */
    private $amountPln;

    /**
     * @param float|null $amountPln
     * @internal
     */
    private function __construct(
        $amountPln = null
    ) {
        if($amountPln === null) {
            $this->currencyPayment = TRUE;
            $this->amountPln = null;
        } else {
            $this->currencyPayment = FALSE;
            $this->amountPln = (float)$amountPln;
        }
    }


    /**
     * @param float $amount
     * @return PaymentCurrency
     */
    public static function pln(float $amount)
    {
        return new self($amount);
    }

    /**
     * @return PaymentCurrency
     */
    public static function foreign()
    {
        return new self();
    }

    /**
     * @return PaymentMethod
     */
    public function isCurrencyPayment()
    {
        return $this->currencyPayment;
    }

    public function amountPln()
    {
        return $this->amountPln;
    }
}
