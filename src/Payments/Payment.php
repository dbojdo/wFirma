<?php

namespace Webit\WFirmaSDK\Payments;

use Webit\WFirmaSDK\Contractors\ContractorId;
use Webit\WFirmaSDK\Entity\DateAwareEntity;
use Webit\WFirmaSDK\Expenses\ExpenseId;
use Webit\WFirmaSDK\Invoices\Invoice;
use Webit\WFirmaSDK\Invoices\InvoiceId;
use Webit\WFirmaSDK\Invoices\PaymentCurrency;
use Webit\WFirmaSDK\PaymentCashboxes\PaymentCashboxId;
use Webit\WFirmaSDK\Series\SeriesId;
use Webit\WFirmaSDK\Tags\TagIds;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("payment")
 */
final class Payment extends DateAwareEntity {
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("object_name")
     * @JMS\Groups({"request", "response"})
     */
    private $objectName;

    /**
     * @var InvoiceId|ExpenseId
     * @JMS\Type("int")
     * @JMS\SerializedName("object_id")
     * @JMS\Groups({"request", "response"})
     */
    private $objectId;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("value")
     * @JMS\Groups({"request", "response"})
     */
    private $value;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("social")
     * @JMS\Groups({"response"})
     */
    private $social;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("health")
     * @JMS\Groups({"response"})
     */
    private $health;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("labor_fund")
     * @JMS\Groups({"response"})
     */
    private $laborFund;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("transitional_retiring_fund")
     * @JMS\Groups({"response"})
     */
    private $transitionalRetiringFund;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("date")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $date;

    /**
     * @var int
     * @JMS\Type("int")
     * @JMS\SerializedName("initial")
     * @JMS\Groups({"response"})
     */
    private $initial;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $type;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("payment_method")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $paymentMethod;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("payment_type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $paymentType;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("account")
     * @JMS\Groups({"request", "response"})
     */
    private $account;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("value_pln")
     * @JMS\Groups({"request", "response"})
     */
    private $valuePln;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("currency_exchange")
     * @JMS\Groups({"response"})
     */
    private $currencyExchange;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("currency_label")
     * @JMS\Groups({"response"})
     */
    private $currencyLabel;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("currency_date")
     * @JMS\Groups({"response"})
     */
    private $currency_date;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("notes")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $notes;

    /**
     * @var TagIds
     * @JMS\Type("Webit\WFirmaSDK\Tags\TagIds")
     * @JMS\SerializedName("tags")
     * @JMS\Groups({"request", "response"})
     */
    private $tags;

    /**
     * @var InvoiceId
     * @JMS\Type("Webit\WFirmaSDK\Invoices\InvoiceId")
     * @JMS\SerializedName("invoice")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $invoiceId;

    /**
     * @var ExpenseId
     * @JMS\Type("Webit\WFirmaSDK\Expenses\ExpenseId")
     * @JMS\SerializedName("expense")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $expenseId;

    /**
     * @var SeriesId
     * @JMS\Type("Webit\WFirmaSDK\Series\SeriesId")
     * @JMS\SerializedName("series")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $seriesId;

    /**
     * @var PaymentCashboxId
     * @JMS\Type("Webit\WFirmaSDK\PaymentCashboxes\PaymentCashboxId")
     * @JMS\SerializedName("payment_cashbox")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $paymentCashboxId;

    /**
     * @var ContractorId
     * @JMS\Type("Webit\WFirmaSDK\Contractors\ContractorId")
     * @JMS\SerializedName("contractor")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $contractorId;

    /**
     * Payment constructor.
     * @param string $objectName
     * @param string $objectId
     * @param float $value
     * @param \DateTimeInterface|null $date
     * @param PaymentMethod|null $paymentMethod
     * @param PaymentCurrency|null $paymentCurrency
     * @param PaymentCashboxId|null $cashboxId
     * @param TagIds|null $tags
     */
    private function __construct(
        $objectName,
        $objectId,
        $value,
        \DateTimeInterface $date = null,
        PaymentMethod $paymentMethod = null,
        PaymentCurrency $paymentCurrency = null,
        PaymentCashboxId $cashboxId = null,
        TagIds $tags = null
    ) {
        $this->objectName = (string)$objectName;
        $this->objectId = (string)$objectId;
        $this->value = (float)$value;
        $this->changeDate($date);
        $this->changePaymentMethod($paymentMethod);
        $this->changePaymentCurrency($paymentCurrency);
        $this->changePaymentCashboxId($cashboxId);
        $this->tags = $tags;
    }

    /**
     * @param Invoice $invoice
     * @param float $value
     * @param \DateTimeInterface|null $date
     * @param PaymentMethod|null $paymentMethod
     * @param PaymentCurrency|null $paymentCurrency
     * @param PaymentCashboxId|null $cashboxId
     * @param TagIds|null $tags
     * @return Payment
     */
    public static function forInvoice(
        Invoice $invoice,
        $value,
        \DateTimeInterface $date = null,
        PaymentMethod $paymentMethod = null,
        PaymentCurrency $paymentCurrency = null,
        PaymentCashboxId $cashboxId = null,
        TagIds $tags = null
    ) {
        return new self(
            'invoice',
            $invoice->id(),
            $value,
            $date,
            $paymentMethod,
            $paymentCurrency,
            $cashboxId,
            $tags
        );
    }

    /**
     * @param InvoiceId $invoice
     * @param float $value
     * @param \DateTimeInterface|null $date
     * @param PaymentMethod|null $paymentMethod
     * @param PaymentCurrency|null $paymentCurrency
     * @param PaymentCashboxId|null $cashboxId
     * @param TagIds|null $tags
     * @return Payment
     */
    public static function forInvoiceOfId(
        InvoiceId $invoiceId,
        $value,
        \DateTimeInterface $date = null,
        PaymentMethod $paymentMethod = null,
        PaymentCurrency $paymentCurrency = null,
        PaymentCashboxId $cashboxId = null,
        TagIds $tags = null
    ) {
        return new self(
            'invoice',
            $invoiceId,
            $value,
            $date,
            $paymentMethod,
            $paymentCurrency,
            $cashboxId,
            $tags
        );
    }

    /**
     * @param Invoice $invoice
     * @param float $value
     * @param \DateTimeInterface|null $date
     * @param PaymentMethod|null $paymentMethod
     * @param PaymentCurrency|null $paymentCurrency
     * @param PaymentCashboxId|null $cashboxId
     * @param TagIds|null $tags
     * @return Payment
     */
    public static function forExpenseOfId(
        ExpenseId $expenseId,
        $value,
        \DateTimeInterface $date = null,
        PaymentMethod $paymentMethod = null,
        PaymentCurrency $paymentCurrency = null,
        PaymentCashboxId $cashboxId = null,
        TagIds $tags = null
    ) {
        return new self(
            'expense',
            $expenseId,
            $value,
            $date,
            $paymentMethod,
            $paymentCurrency,
            $cashboxId,
            $tags
        );
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|PaymentId
     */
    public function id()
    {
        return PaymentId::create($this->plainId());
    }

    /**
     * @return float
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return Payment
     */
    public function changeValue(float $value)
    {
        $this->value = (float)$value;
    }

    /**
     * @return \DateTimeInterface
     */
    public function date()
    {
        $date = \DateTimeImmutable::createFromInterface($this->date);
        return $date->setTime(0, 0);
    }

    /**
     * @param \DateTimeInterface $date
     * @return Payment
     */
    public function changeDate(\DateTimeInterface $date = null)
    {
        $this->date = \DateTime::createFromInterface($date ?: new \DateTime());
        return $this;
    }

    /**
     * @return PaymentMethod
     */
    public function paymentMethod()
    {
        return PaymentMethod::fromString($this->paymentMethod);
    }

    /**
     * @param PaymentMethod $paymentMethod
     * @return Payment
     */
    public function changePaymentMethod(PaymentMethod $paymentMethod = null)
    {
        $this->paymentMethod = (string)($paymentMethod ?: PaymentMethod::cash());
        return $this;
    }

    /**
     * @return PaymentCurrency|null
     */
    public function paymentCurrency()
    {
        if ($this->account === 'pln') {
            return PaymentCurrency::pln($this->valuePln);
        } elseif ($this->account === 'currency') {
            return PaymentCurrency::foreign();
        }

        return null;
    }

    /**
     * @param PaymentCurrency|null $paymentCurrency
     * @return Payment
     */
    public function changePaymentCurrency(PaymentCurrency $paymentCurrency = null)
    {
        if ($paymentCurrency) {
            $this->account = $paymentCurrency->isCurrencyPayment() ? 'currenct' : 'pln';
            $this->valuePln = $paymentCurrency->amountPln();
        } else {
            $this->account = null;
            $this->valuePln = null;
        }
        return $this;
    }

    /**
     * @return PaymentCashboxId|null $cashboxId
     */
    public function paymentCashboxId()
    {
        return PaymentCashboxId::create($this->paymentCashboxId);
    }

    /**
     * @param PaymentCashboxId|null $cashboxId
     * @return Payment
     */
    public function changePaymentCashboxId(PaymentCashboxId $paymentCashboxId = null)
    {
        if ($paymentCashboxId) {
            $this->paymentType = 'cashbox';
            $this->paymentCashboxId = (string)$paymentCashboxId;
        } else {
            $this->paymentType = 'normal';
            $this->paymentCashboxId = null;
        }
        return $this;
    }
}
