<?php

namespace Webit\WFirmaSDK\Payments;

final class PaymentAmount
{
    private const ACCOUNT_PLN = 'pln';
    private const ACCOUNT_CURRENCY = 'currency';

    /** @var float */
    private $value;

    /** @var string|null */
    private $account;

    /** @var float|null */
    private $valuePln;

    /** @var float|null */
    private $exchangeRate;

    /** @var string|null */
    private $nbpLabel;

    /** @var \DateTime|null */
    private $rateDate;

    /**
     * @internal To create this object use named constructors `forPlnAccount` or `forCurrencyAccount`
     *
     * @param float $value
     * @param ?string $account
     * @param float|null $valuePln
     * @param float|null $exchangeRate
     * @param string|null $nbpLabel
     * @param \DateTime|null $rateDate
     */
    public function __construct(float $value, ?string $account = null, ?float $valuePln = null, ?float $exchangeRate = null, ?string $nbpLabel = null, \DateTime $rateDate = null)
    {
        $this->value = round($value, 2);
        $this->account = $account;
        $this->valuePln = $valuePln !== null ? round($valuePln, 2) : null;
        $this->exchangeRate = $exchangeRate;
        $this->nbpLabel = $nbpLabel;
        $this->rateDate = $rateDate;
    }

    /**
     * @return ?float
     */
    public function value(): ?float
    {
        return $this->value;
    }

    /**
     * @return ?string
     */
    public function account(): ?string
    {
        return $this->account;
    }

    /**
     * @return ?float
     */
    public function valuePln(): ?float
    {
        return $this->valuePln;
    }

    /**
     * @return ?float
     */
    public function exchangeRate(): ?float
    {
        return $this->exchangeRate;
    }

    /**
     * @return ?string
     */
    public function nbpLabel(): ?string
    {
        return $this->nbpLabel;
    }

    /**
     * @return ?\DateTime
     */
    public function rateDate(): ?\DateTime
    {
        return $this->rateDate;
    }

    /**
     * @param float
     * @param float|null $valuePln
     * @return PaymentAmount
     */
    public static function forPlnAccount(float $value, ?float $valuePln = null): PaymentAmount
    {
        return new self($value, self::ACCOUNT_PLN, $valuePln);
    }

    /**
     * @param float
     * @param float|null $valuePln
     * @return PaymentAmount
     */
    public static function forCurrencyAccount(float $value, ?float $valuePln = null): PaymentAmount
    {
        return new self($value, self::ACCOUNT_CURRENCY, $valuePln);
    }
}
