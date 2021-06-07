<?php

namespace Webit\WFirmaSDK\Invoices;

use Webit\WFirmaSDK\Payments\PaymentMethod;

final class Payment
{
    /** @var PaymentMethod */
    private $paymentMethod;

    /** @var \DateTime */
    private $paymentDate;

    /** @var PaymentState */
    private $paymentState;

    /** @var float */
    private $alreadyPaid;

    /** @var float */
    private $alreadyPaidInitial;

    /** @var float */
    private $remaining;

    /** @var string */
    private $interestStatus;

    /**
     * @param PaymentMethod $paymentMethod
     * @param \DateTime $paymentDate
     * @param PaymentState $paymentState
     * @param float $alreadyPaid
     * @param float $alreadyPaidInitial
     * @param float $remaining
     * @param string $interestStatus
     * @internal
     */
    private function __construct(
        PaymentMethod $paymentMethod = null,
        \DateTime $paymentDate = null,
        $alreadyPaidInitial = null,
        PaymentState $paymentState = null,
        $alreadyPaid = null,
        $remaining = null,
        $interestStatus = null
    ) {
        $this->paymentMethod = $paymentMethod;
        $this->paymentDate = $paymentDate;
        $this->paymentState = $paymentState;
        $this->alreadyPaid = $alreadyPaid;
        $this->alreadyPaidInitial = $alreadyPaidInitial;
        $this->remaining = $remaining;
        $this->interestStatus = $interestStatus;
    }

    /**
     * @param PaymentMethod $paymentMethod
     * @param \DateTime|null $paymentDate
     * @param null $alreadyPaidInitial
     * @return Payment
     */
    public static function create(
        PaymentMethod $paymentMethod,
        \DateTime $paymentDate = null,
        $alreadyPaidInitial = null
    ) {
        return new self(
            $paymentMethod,
            $paymentDate,
            $alreadyPaidInitial
        );
    }

    /**
     * @param PaymentMethod $paymentMethod
     * @param \DateTime|null $paymentDate
     * @param null $alreadyPaidInitial
     * @param PaymentState|null $paymentState
     * @param float $alreadyPaid
     * @param float $remaining
     * @param string $interestStatus
     * @return Payment
     * @internal
     */
    public static function createFull(
        PaymentMethod $paymentMethod = null,
        \DateTime $paymentDate = null,
        $alreadyPaidInitial = null,
        PaymentState $paymentState = null,
        $alreadyPaid = null,
        $remaining = null,
        $interestStatus = null
    ) {
        return new self(
            $paymentMethod,
            $paymentDate,
            $alreadyPaidInitial,
            $paymentState,
            $alreadyPaid,
            $remaining,
            $interestStatus
        );
    }

    /**
     * @return PaymentMethod
     */
    public function paymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param PaymentMethod $paymentMethod
     * @return Payment
     */
    public function withPaymentMethod(PaymentMethod $paymentMethod)
    {
        return self::createFull(
            $paymentMethod,
            $this->paymentDate,
            $this->alreadyPaidInitial,
            $this->paymentState,
            $this->alreadyPaid,
            $this->remaining,
            $this->interestStatus
        );
    }

    /**
     * @return \DateTime
     */
    public function paymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param \DateTime $paymentDate
     * @return Payment
     */
    public function withPaymentDate(\DateTime $paymentDate)
    {
        return self::createFull(
            $this->paymentMethod,
            $paymentDate,
            $this->alreadyPaidInitial,
            $this->paymentState,
            $this->alreadyPaid,
            $this->remaining,
            $this->interestStatus
        );
    }

    /**
     * @return PaymentState
     */
    public function paymentState()
    {
        return $this->paymentState;
    }

    /**
     * @return float
     */
    public function alreadyPaid()
    {
        return $this->alreadyPaid;
    }

    /**
     * @return float
     */
    public function alreadyPaidInitial()
    {
        return $this->alreadyPaidInitial;
    }

    /**
     * @param float $alreadyPaidInitial
     * @return Payment
     */
    public function withAlreadyPaidInitial($alreadyPaidInitial)
    {
        return self::createFull(
            $this->paymentMethod,
            $this->paymentDate,
            $alreadyPaidInitial,
            $this->paymentState,
            $this->alreadyPaid,
            $this->remaining,
            $this->interestStatus
        );
    }

    /**
     * @return float
     */
    public function remaining()
    {
        return $this->remaining;
    }

    public function interestStatus()
    {
        return $this->interestStatus;
    }
}
