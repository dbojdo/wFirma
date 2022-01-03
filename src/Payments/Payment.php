<?php

namespace Webit\WFirmaSDK\Payments;

use Webit\WFirmaSDK\Contractors\ContractorId;
use Webit\WFirmaSDK\Entity\AbstractEntityId;
use Webit\WFirmaSDK\Entity\DateAwareEntity;
use Webit\WFirmaSDK\Expenses\ExpenseId;
use Webit\WFirmaSDK\Invoices\Invoice;
use Webit\WFirmaSDK\Invoices\InvoiceId;
use Webit\WFirmaSDK\PaymentCashboxes\PaymentCashboxId;
use Webit\WFirmaSDK\Series\SeriesId;
use Webit\WFirmaSDK\Tags\TagIds;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("payment")
 */
final class Payment extends DateAwareEntity
{
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
     * @var ?float
     * @JMS\Type("double")
     * @JMS\SerializedName("value")
     * @JMS\Groups({"request", "response"})
     */
    private $value;

    /**
     * @var ?float
     * @JMS\Type("double")
     * @JMS\SerializedName("social")
     * @JMS\Groups({"response"})
     */
    private $social;

    /**
     * @var ?float
     * @JMS\Type("double")
     * @JMS\SerializedName("health")
     * @JMS\Groups({"response"})
     */
    private $health;

    /**
     * @var ?float
     * @JMS\Type("double")
     * @JMS\SerializedName("labor_fund")
     * @JMS\Groups({"response"})
     */
    private $laborFund;

    /**
     * @var ?float
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
     * @JMS\XmlElement(cdata=false)
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
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $currencyLabel;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("currency_date")
     * @JMS\Groups({"response"})
     */
    private $currencyDate;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("notes")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
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

    private function __construct(
        $objectName,
        $objectId,
        PaymentAmount $paymentAmount,
        \DateTime $date,
        PaymentMethod $paymentMethod,
        TagIds $tags = null
    ) {
        $this->objectName = (string)$objectName;
        $this->objectId = (string)$objectId;
        $this->changeDate($date);
        $this->changeAmount($paymentAmount);
        $this->changePaymentMethod($paymentMethod);
        $this->tags = $tags;
    }

    /**
     * @param Invoice $invoice
     * @param PaymentAmount $paymentAmount
     * @param \DateTime $date
     * @param PaymentMethod $paymentMethod
     * @param TagIds|null $tags
     * @return Payment
     */
    public static function forInvoice(
        Invoice $invoice,
        PaymentAmount $paymentAmount,
        \DateTime $date,
        PaymentMethod $paymentMethod,
        TagIds $tags = null
    ): Payment {
        return new self(
            'invoice',
            $invoice->id(),
            $paymentAmount,
            $date,
            $paymentMethod,
            $tags
        );
    }

    /**
     * @param InvoiceId $invoiceId
     * @param PaymentAmount $paymentAmount
     * @param \DateTime $date
     * @param PaymentMethod|null $paymentMethod
     * @param TagIds|null $tags
     * @return Payment
     */
    public static function forInvoiceOfId(
        InvoiceId $invoiceId,
        PaymentAmount $paymentAmount,
        \DateTime $date,
        PaymentMethod $paymentMethod,
        TagIds $tags = null
    ): Payment {
        return new self(
            'invoice',
            $invoiceId,
            $paymentAmount,
            $date,
            $paymentMethod,
            $tags
        );
    }

    /**
     * @param ExpenseId $expenseId
     * @param PaymentAmount $paymentAmount
     * @param \DateTime $date
     * @param PaymentMethod $paymentMethod
     * @param TagIds|null $tags
     * @return Payment
     */
    public static function forExpenseOfId(
        ExpenseId $expenseId,
        PaymentAmount $paymentAmount,
        \DateTime $date,
        PaymentMethod $paymentMethod,
        TagIds $tags = null
    ): Payment {
        return new self(
            'expense',
            $expenseId,
            $paymentAmount,
            $date,
            $paymentMethod,
            $tags
        );
    }

    /**
     * @return null|PaymentId
     */
    public function id(): ?PaymentId
    {
        return PaymentId::create($this->plainId());
    }

    /**
     * @return \DateTime
     */
    public function date(): \DateTime
    {
        return $this->date->setTime(0, 0);
    }

    /**
     * @param \DateTime $date
     * @return Payment
     */
    public function changeDate(\DateTime $date): Payment
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return PaymentMethod
     */
    public function paymentMethod(): PaymentMethod
    {
        return PaymentMethod::fromString($this->paymentMethod);
    }

    /**
     * @param PaymentMethod|null $paymentMethod
     * @return Payment
     */
    public function changePaymentMethod(PaymentMethod $paymentMethod = null): Payment
    {
        $this->paymentMethod = $paymentMethod ? (string)$paymentMethod : null;
        return $this;
    }

    /**
     * @return PaymentAmount
     */
    public function amount(): PaymentAmount
    {
        return new PaymentAmount(
            (float)$this->value,
            $this->account,
            $this->valuePln,
            $this->currencyExchange,
            $this->currencyLabel,
            $this->currencyDate
        );
    }

    /**
     * @param PaymentAmount $paymentCurrency
     * @return Payment
     */
    public function changeAmount(PaymentAmount $paymentCurrency): Payment
    {
        $this->value = $paymentCurrency->value();
        $this->account = $paymentCurrency->account();
        $this->valuePln = $paymentCurrency->valuePln();
        $this->currencyDate = $paymentCurrency->rateDate();
        $this->currencyExchange = $paymentCurrency->exchangeRate();
        $this->currencyLabel = $paymentCurrency->nbpLabel();

        return $this;
    }

    public function objectName(): string
    {
        return $this->objectName;
    }

    /**
     * @return null|InvoiceId|ExpenseId
     */
    public function objectId(): ?AbstractEntityId
    {
        return $this->objectId;
    }

    public function social(): ?float
    {
        return $this->social;
    }

    public function health(): ?float
    {
        return $this->health;
    }

    public function laborFund(): ?float
    {
        return $this->laborFund;
    }

    public function transitionalRetiringFund(): float
    {
        return $this->transitionalRetiringFund;
    }

    public function initial(): int
    {
        return $this->initial;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function paymentType(): string
    {
        return $this->paymentType;
    }

    public function notes(): int
    {
        return $this->notes;
    }

    public function tags(): ?TagIds
    {
        return $this->tags;
    }

    public function changeTags(TagIds $tagIds = null): Payment
    {
        $this->tags = $tagIds;
        return $this;
    }

    /**
     * @return PaymentCashboxId|null $cashboxId
     */
    public function paymentCashboxId(): ?PaymentCashboxId
    {
        return $this->paymentCashboxId->isEmpty() ? null : $this->paymentCashboxId;
    }

    public function invoiceId(): ?InvoiceId
    {
        return $this->invoiceId && !$this->invoiceId->isEmpty() ? $this->invoiceId : null;
    }

    public function expenseId(): ?ExpenseId
    {
        return $this->expenseId && !$this->expenseId->isEmpty() ? $this->expenseId : null;
    }

    public function seriesId(): ?SeriesId
    {
        return $this->seriesId && !$this->seriesId->isEmpty() ? $this->seriesId : null;
    }

    public function contractorId(): ?ContractorId
    {
        return $this->contractorId && !$this->contractorId->isEmpty() ? $this->contractorId : null;
    }
}
