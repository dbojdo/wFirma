<?php

namespace Webit\WFirmaSDK\Invoices;

final class Currency
{
    /** @var string */
    private $currency;

    /** @var float */
    private $currencyExchange;

    /** @var string */
    private $currencyLabel;

    /** @var \DateTime */
    private $currencyDate;

    /** @var float */
    private $priceCurrencyExchange;

    /** @var float */
    private $goodPriceGroupCurrencyExchange;

    /**
     * Currency constructor.
     * @param string $currency
     * @param float $currencyExchange
     * @param string $currencyLabel
     * @param \DateTime $currencyDate
     * @param float $priceCurrencyExchange
     * @param float $goodPriceGroupCurrencyExchange
     */
    public function __construct(
        $currency,
        $currencyExchange = null,
        $currencyLabel = null,
        \DateTime $currencyDate = null,
        $priceCurrencyExchange = null,
        $goodPriceGroupCurrencyExchange = null
    ) {
        $this->currency = $currency;
        $this->currencyExchange = $currencyExchange;
        $this->currencyLabel = $currencyLabel;
        $this->currencyDate = $currencyDate;
        $this->priceCurrencyExchange = $priceCurrencyExchange;
        $this->goodPriceGroupCurrencyExchange = $goodPriceGroupCurrencyExchange;
    }

    /**
     * @return string
     */
    public function currency()
    {
        return $this->currency;
    }

    /**
     * @return float
     */
    public function currencyExchange()
    {
        return $this->currencyExchange;
    }

    /**
     * @return string
     */
    public function currencyLabel()
    {
        return $this->currencyLabel;
    }

    /**
     * @return \DateTime
     */
    public function currencyDate()
    {
        return $this->currencyDate;
    }

    /**
     * @return float
     */
    public function priceCurrencyExchange()
    {
        return $this->priceCurrencyExchange;
    }

    /**
     * @return float
     */
    public function goodPriceGroupCurrencyExchange()
    {
        return $this->goodPriceGroupCurrencyExchange;
    }
}