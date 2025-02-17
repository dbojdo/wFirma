<?php

namespace Webit\WFirmaSDK\Invoices;

use Webit\WFirmaSDK\Contractors\Contractor;
use Webit\WFirmaSDK\Contractors\ContractorId;
use Webit\WFirmaSDK\Entity\DateAwareEntity;
use Webit\WFirmaSDK\Series\SeriesId;
use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Payments\PaymentMethod;
use Webit\WFirmaSDK\Tags\TagIds;

/**
 * @JMS\XmlRoot("invoice")
 */
final class Invoice extends DateAwareEntity
{
    /**
     * @var ContractorId|Contractor
     * @JMS\Type("Webit\WFirmaSDK\Contractors\ContractorId")
     * @JMS\SerializedName("contractor")
     * @JMS\Groups({"request", "response"})
     */
    private $contractorId;

    /**
     * @var Contractor
     * @JMS\Type("Webit\WFirmaSDK\Contractors\Contractor")
     * @JMS\SerializedName("contractor")
     * @JMS\Groups({"request"})
     */
    private $contractor;

    /**
     * @var ContractorDetail
     * @JMS\Type("Webit\WFirmaSDK\Invoices\ContractorDetail")
     * @JMS\SerializedName("contractor_detail")
     * @JMS\Groups({"response"})
     */
    private $contractorDetail;

    /**
     * @var CompanyDetail
     * @JMS\Type("Webit\WFirmaSDK\Invoices\CompanyDetail")
     * @JMS\SerializedName("company_detail")
     * @JMS\Groups({"response"})
     */
    private $companyDetail;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("paymentmethod")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $paymentMethod;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("paymentdate")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $paymentDate;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("paymentstate")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $paymentState;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("interest_status")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $interestStatus;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("disposaldate_format")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $disposalDateFormat;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("disposaldate_empty")
     * @JMS\Groups({"request", "response"})
     */
    private $disposalDateEmpty;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("disposaldate")
     * @JMS\Groups({"request", "response"})
     */
    private $disposalDate;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("date")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $date;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("period")
     * @JMS\Groups({"response"})
     */
    private $period;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("total")
     * @JMS\Groups({"response"})
     */
    private $total;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("total_composed")
     * @JMS\Groups({"response"})
     */
    private $totalComposed;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("alreadypaid")
     * @JMS\Groups({"response"})
     */
    private $alreadyPaid;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("alreadypaid_initial")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $alreadyPaidInitial;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("remaining")
     * @JMS\Groups({"response"})
     */
    private $remaining;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("number")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"addRequest", "editRequest", "response"})
     */
    private $number;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("day")
     * @JMS\Groups({"addRequest", "editRequest", "response"})
     */
    private $day;

    /**
     * @var string
     * @JMS\Type("integer")
     * @JMS\SerializedName("month")
     * @JMS\Groups({"addRequest", "editRequest", "response"})
     */
    private $month;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("year")
     * @JMS\Groups({"addRequest", "editRequest", "response"})
     */
    private $year;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("day_year")
     * @JMS\Groups({"response"})
     */
    private $dayYear;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("fullnumber")
     * @JMS\Groups({"response"})
     */
    private $fullNumber;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("semitemplatenumber")
     * @JMS\Groups({"response"})
     */
    private $semiTemplateNumber;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $type;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("correction_type")
     * @JMS\Groups({"response"})
     */
    private $correctionType;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("corrections")
     * @JMS\Groups({"response"})
     */
    private $corrections;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("formal_data_corrections")
     * @JMS\Groups({"response"})
     */
    private $formalDataCorrections;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("currency")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $currencySymbol;

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
    private $currencyDate;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("price_currency_exchange")
     * @JMS\Groups({"response"})
     */
    private $priceCurrencyExchange;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("good_price_group_currency_exchange")
     * @JMS\Groups({"response"})
     */
    private $goodPriceGroupCurrencyExchange;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("template")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $template;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type_of_sale")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $typeOfSale;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("auto_send")
     * @JMS\Groups({"request", "response"})
     */
    private $autoSend;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("auto_send_postivo")
     * @JMS\Groups({"request", "response"})
     */
    private $autoSendPostivo;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("auto_sms")
     * @JMS\Groups({"request", "response"})
     */
    private $autoSms;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @JMS\Groups({"request", "response"})
     */
    private $description;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("header")
     * @JMS\Groups({"response"})
     */
    private $header;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("footer")
     * @JMS\Groups({"response"})
     */
    private $footer;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("user_name")
     * @JMS\Groups({"response"})
     */
    private $userName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("schema")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $schema;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("schema_bill")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $schemaBill;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("schema_canceled")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $schemaCanceled;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("register_description")
     * @JMS\Groups({"request", "response"})
     */
    private $registerDescription;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("netto")
     * @JMS\Groups({"response"})
     */
    private $netto;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("tax")
     * @JMS\Groups({"response"})
     */
    private $tax;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("signed")
     * @JMS\Groups({"response"})
     */
    private $signed;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("hash")
     * @JMS\Groups({"response"})
     */
    private $hash;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("id_external")
     * @JMS\Groups({"request", "response"})
     */
    private $idExternal;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("warehouse_type")
     * @JMS\Groups({"response"})
     */
    private $warehouseType;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("notes")
     * @JMS\Groups({"response"})
     */
    private $notes;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("documents")
     * @JMS\Groups({"response"})
     */
    private $documents;

    /**
     * @var TagIds
     * @JMS\Type("Webit\WFirmaSDK\Tags\TagIds")
     * @JMS\SerializedName("tags")
     * @JMS\Groups({"request", "response"})
     */
    private $tags;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("price_type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $priceType;

    /**
     * @var InvoicesContent[]
     * @JMS\SerializedName("invoicecontents")
     * @JMS\Type("array<Webit\WFirmaSDK\Invoices\InvoicesContent>")
     * @JMS\XmlList(entry="invoicecontent")
     * @JMS\Groups({"request", "response"})
     */
    private $invoiceContents;

    /**
     * @var SeriesId
     * @JMS\SerializedName("series")
     * @JMS\Type("Webit\WFirmaSDK\Series\SeriesId")
     * @JMS\Groups({"request", "response"})
     */
    private $seriesId;

    /**
     * Invoice constructor.
     * @param Contractor $contractor
     * @param Payment $payment
     * @param Type $type
     * @param SeriesId|null $seriesId
     * @param \DateTime $issueDate
     * @param Disposal $disposal
     * @param InvoiceNumber|null $invoiceNumber
     * @param string $currencySymbol
     * @param int $template
     * @param AutoSend $autoSend
     * @param string $description
     * @param Schema $schema
     * @param bool $schemaBill
     * @param bool $schemaCanceled
     * @param string $registerDescription
     * @param string $idExternal
     * @param ?PriceType|string $priceType
     * @param TagIds $tags
     */
    private function __construct(
        $contractor,
        Payment $payment,
        Type $type = null,
        SeriesId $seriesId = null,
        \DateTime $issueDate = null,
        Disposal $disposal = null,
        InvoiceNumber $invoiceNumber = null,
        $currencySymbol = null,
        $template = null,
        AutoSend $autoSend = null,
        $description = null,
        Schema $schema = null,
        $schemaBill = false,
        $schemaCanceled = false,
        $registerDescription = null,
        $idExternal = null,
        $priceType = null,
        TagIds $tags = null
    ) {
        $this->setContractor($contractor);

        if ($payment) {
            $this->changePayment($payment);
        }

        if ($disposal) {
            $this->changeDisposal($disposal);
        }

        if ($issueDate) {
            $this->changeIssueDate($issueDate);
        }

        if ($invoiceNumber) {
            $this->changeInvoiceNumber($invoiceNumber);
        }

        $this->changeAutoSend($autoSend ?: new AutoSend());

        $this->type = (string)($type ?: Type::vat());
        $this->currencySymbol = $currencySymbol;
        $this->template = $template;
        $this->description = $description;
        $this->schema = (string)($schema ?: Schema::normal());
        $this->schemaBill = (int)$schemaBill;
        $this->schemaCanceled = (int)$schemaCanceled;
        $this->registerDescription = $registerDescription;
        $this->idExternal = $idExternal;
        $this->tags = $tags;
        $this->priceType = (string)$priceType;
        $this->invoiceContents = array();
        $this->seriesId = $seriesId;
    }

    /**
     * @param Contractor $contractor
     * @param Payment $payment
     * @param Type|null $type
     * @param SeriesId|null $seriesId
     * @param \DateTime|null $issueDate
     * @param Disposal|null $disposal
     * @param InvoiceNumber|null $invoiceNumber
     * @param null $currencySymbol
     * @param null $template
     * @param AutoSend|null $autoSend
     * @param null $description
     * @param Schema|null $schema
     * @param bool $schemaBill
     * @param bool $schemaCanceled
     * @param null $registerDescription
     * @param null $idExternal
     * @param ?PriceType|string $priceType
     * @param TagIds|null $tags
     * @return Invoice
     */
    public static function forContractor(
        Contractor $contractor,
        Payment $payment,
        Type $type = null,
        SeriesId $seriesId = null,
        \DateTime $issueDate = null,
        Disposal $disposal = null,
        InvoiceNumber $invoiceNumber = null,
        $currencySymbol = null,
        $template = null,
        AutoSend $autoSend = null,
        $description = null,
        Schema $schema = null,
        $schemaBill = false,
        $schemaCanceled = false,
        $registerDescription = null,
        $idExternal = null,
        $priceType = null,
        TagIds $tags = null
    ) {
        return new self(
            $contractor,
            $payment,
            $type,
            $seriesId,
            $issueDate,
            $disposal,
            $invoiceNumber,
            $currencySymbol,
            $template,
            $autoSend,
            $description,
            $schema,
            $schemaBill,
            $schemaCanceled,
            $registerDescription,
            $idExternal,
            $priceType,
            $tags
        );
    }

    /**
     * @param ContractorId $contractorId
     * @param Payment $payment
     * @param Type|null $type
     * @param SeriesId|null $seriesId
     * @param \DateTime|null $issueDate
     * @param Disposal|null $disposal
     * @param InvoiceNumber|null $invoiceNumber
     * @param null $currencySymbol
     * @param null $template
     * @param AutoSend|null $autoSend
     * @param null $description
     * @param Schema|null $schema
     * @param bool $schemaBill
     * @param bool $schemaCanceled
     * @param null $registerDescription
     * @param null $idExternal
     * @param ?PriceType|string $priceType
     * @param TagIds|null $tags
     * @return Invoice
     */
    public static function forContractorOfId(
        ContractorId $contractorId,
        Payment $payment,
        Type $type = null,
        SeriesId $seriesId = null,
        \DateTime $issueDate = null,
        Disposal $disposal = null,
        InvoiceNumber $invoiceNumber = null,
        $currencySymbol = null,
        $template = null,
        AutoSend $autoSend = null,
        $description = null,
        Schema $schema = null,
        $schemaBill = false,
        $schemaCanceled = false,
        $registerDescription = null,
        $idExternal = null,
        $priceType = null,
        TagIds $tags = null
    ) {
        return new self(
            $contractorId,
            $payment,
            $type,
            $seriesId,
            $issueDate,
            $disposal,
            $invoiceNumber,
            $currencySymbol,
            $template,
            $autoSend,
            $description,
            $schema,
            $schemaBill,
            $schemaCanceled,
            $registerDescription,
            $idExternal,
            $priceType,
            $tags
        );
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|InvoiceId
     */
    public function id()
    {
        return InvoiceId::create($this->plainId());
    }

    /**
     * @return null|ContractorId
     */
    public function contractorId(): ?ContractorId
    {
        if ($this->contractorId) {
            return $this->contractorId;
        }

        if ($this->contractor) {
            return $this->contractor->id();
        }

        return null;
    }

    /**
     * @return ContractorDetail
     */
    public function contractorDetail()
    {
        return $this->contractorDetail;
    }

    /**
     * @return CompanyDetail
     */
    public function companyDetail()
    {
        return $this->companyDetail;
    }

    /**
     * @param Contractor $contractor
     */
    public function changeContractor(Contractor $contractor)
    {
        $this->contractorId = null;
        $this->contractor = $contractor;
        if ($this->contractorDetail) {
            $this->contractorDetail->updateWith($contractor);
        } else {
            $this->contractorDetail = ContractorDetail::fromContractor($contractor);
        }
    }

    /**
     * @param ContractorId $contractorId
     */
    public function changeContractorWithId(ContractorId $contractorId)
    {
        $this->contractor = null;
        $this->contractorId = $contractorId;
        $this->contractorDetail = null;
    }

    /**
     * @return Currency
     */
    public function currencySymbol()
    {
        return new Currency(
            $this->currencySymbol,
            $this->currencyExchange,
            $this->currencyLabel,
            $this->currencyDate,
            $this->priceCurrencyExchange,
            $this->goodPriceGroupCurrencyExchange
        );
    }

    /**
     * @param string $currencySymbol
     * @return Invoice
     */
    public function changeCurrencySymbol($currencySymbol)
    {
        $this->currencySymbol = $currencySymbol;
        return $this;
    }

    /**
     * @return null|Schema
     */
    public function schema()
    {
        return $this->schema ? Schema::fromString($this->schema) : null;
    }

    /**
     * @param Schema $schema
     * @return Invoice
     */
    public function changeSchema(Schema $schema): Invoice
    {
        $this->schema = (string)$schema;
        return $this;
    }

    /**
     * @return Payment
     */
    public function payment()
    {
        return Payment::createFull(
            $this->paymentMethod ? PaymentMethod::fromString($this->paymentMethod) : null,
            $this->paymentDate,
            $this->alreadyPaidInitial,
            $this->paymentState ? PaymentState::fromString($this->paymentState) : null,
            $this->alreadyPaid,
            $this->remaining,
            $this->interestStatus
        );
    }

    /**
     * @param Payment $payment
     * @return Invoice
     */
    public function changePayment(Payment $payment)
    {
        $this->paymentMethod = $payment->paymentMethod();
        $this->paymentDate = $payment->paymentDate();
        $this->alreadyPaidInitial = $payment->alreadyPaidInitial();

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function issueDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $issueDate
     * @return Invoice
     */
    public function changeIssueDate(\DateTime $issueDate)
    {
        $this->date = $issueDate;
        return $this;
    }

    /**
     * @param Disposal $disposal
     * @return Invoice
     */
    public function changeDisposal(Disposal $disposal)
    {
        $this->disposalDate = $disposal->date();
        $this->disposalDateEmpty = (int)$disposal->dateEmpty();
        $this->disposalDateFormat = $disposal->dateFormat();

        return $this;
    }

    /**
     * @return Disposal
     */
    public function disposal()
    {
        if ($this->disposalDateEmpty) {
            return Disposal::withEmptyDate();
        }

        return Disposal::withDate($this->disposalDate, $this->disposalDateFormat);
    }

    /**
     * @return InvoiceNumber
     */
    public function number()
    {
        return InvoiceNumber::existingNumber(
            $this->number,
            $this->day,
            $this->month,
            $this->year,
            $this->dayYear,
            $this->fullNumber,
            $this->semiTemplateNumber
        );
    }

    /**
     * @param InvoiceNumber $invoiceNumber
     * @return Invoice
     */
    public function changeInvoiceNumber(InvoiceNumber $invoiceNumber)
    {
        $this->number = $invoiceNumber->number();
        $this->day = $invoiceNumber->day();
        $this->month = $invoiceNumber->month();
        $this->year = $invoiceNumber->year();
        $this->dayYear = $invoiceNumber->dayYear();
        $this->fullNumber = null;
        $this->semiTemplateNumber = null;

        return $this;
    }

    /**
     * @return int
     */
    public function signed()
    {
        return $this->signed;
    }

    /**
     * @return string
     */
    public function hash()
    {
        return $this->hash;
    }

    /**
     * @return PriceType
     */
    public function priceType(): ?PriceType
    {
        return $this->priceType ? PriceType::fromString($this->priceType) : null;
    }

    /**
     * @param PriceType $priceType
     * @return Invoice
     */
    public function changePriceType(PriceType $priceType): Invoice
    {
        $this->priceType = (string)$priceType;
        return $this;
    }

    /**
     * @return InvoicesContent[]
     */
    public function invoiceContents()
    {
        return $this->invoiceContents;
    }

    /**
     * @param InvoicesContent $content
     */
    public function addInvoiceContent(InvoicesContent $content)
    {
        $this->invoiceContents[] = $content;
    }

    /**
     * @param InvoicesContent $content
     */
    public function removeInvoiceContent(InvoicesContent $content)
    {
        $key = array_search($content, $this->invoiceContents);
        if ($key === false) {
            return;
        }

        unset($this->invoiceContents[$key]);
        $this->invoiceContents = array_values($this->invoiceContents);
    }

    /**
     * @return Correction
     */
    public function correction()
    {
        return new Correction($this->correctionType, $this->corrections, $this->formalDataCorrections);
    }

    /**
     * @return TypeOfSale[]
     */
    public function typesOfSale()
    {
        $typesOfSale = json_decode($this->typeOfSale, true);
        $typesOfSale = array_map(
            function($typeOfSale) {
                return TypeOfSale::fromString($typeOfSale);
            },
            is_array($typesOfSale) ? $typesOfSale : []
        );
        sort($typesOfSale);
        return array_values($typesOfSale);
    }

    /**
     * @param TypeOfSale[] $typesOfSale
     */
    public function changeTypesOfSale(TypeOfSale ...$typesOfSale)
    {
        $typesOfSale = array_unique(
            array_map(
                function($typeOfSale) {
                    return (string)$typeOfSale;
                },
                $typesOfSale
            )
        );
        sort($typesOfSale);
        $typesOfSale = array_values($typesOfSale);

        $this->typeOfSale = count($typesOfSale) > 0 ? json_encode($typesOfSale) : '';
    }

    /**
     * @return AutoSend
     */
    public function autoSend()
    {
        return new AutoSend($this->autoSend, $this->autoSendPostivo, $this->autoSms);
    }

    /**
     * @param AutoSend $autoSend
     * @return Invoice
     */
    public function changeAutoSend(AutoSend $autoSend)
    {
        $this->autoSend = (int)$autoSend->isEmailEnabled();
        $this->autoSendPostivo = (int)$autoSend->isPostivoEnabled();
        $this->autoSms = (int)$autoSend->isSmsEnabled();
        return $this;
    }

    /**
     * @return Totals
     */
    public function totals()
    {
        return new Totals($this->total, $this->totalComposed, $this->tax, $this->netto);
    }

    /**
     * @JMS\PreSerialize
     */
    public function preSerialize()
    {
        if ($this->contractorId) {
            $this->contractor = null;
            return;
        }
    }

    /**
     * @param ContractorId|Contractor $contractor
     */
    private function setContractor($contractor)
    {
        switch (true) {
            case $contractor instanceof ContractorId:
                $this->changeContractorWithId($contractor);
                return;
            case $contractor instanceof Contractor:
                $this->changeContractor($contractor);
                return;

        }

        throw new \InvalidArgumentException('Contractor must be instance of "Contractor" or "ContractorId".');
    }
}
