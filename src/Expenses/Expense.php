<?php

namespace Webit\WFirmaSDK\Expenses;

use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Contractors\ContractorId;
use Webit\WFirmaSDK\Invoices\Currency;
use Webit\WFirmaSDK\Payments\PaymentMethod;
use Webit\WFirmaSDK\Tags\TagIds;

/**
 * @JMS\XmlRoot("expense")
 */
final class Expense extends DateAwareEntity
{

    /**
     * Typ dokumentu - invoice, bill, vat_exempt
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $type;

    /**
     * No manual. For KPiR: taxregister
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("register_type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $registerType;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("fullnumber")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $fullNumber;

    /**
     * Data wystawienia wydatku
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("date")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $date;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("reception_date")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $receptionDate;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("taxregister_date")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $taxRegisterDate;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("vatregister_date")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $vatRegisterDate;

    /**
     * Termin płatności
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("payment_date")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $paymentDate;

    /**
     * Podzielona płatność - 0, 1
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("split_payment")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $splitPayment;

    /**
     * Opis rodzaju wydatku
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $description;

    /**
     * Kwota netto
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("netto")
     * @JMS\Groups({"response"})
     */
    private $netto;

    /**
     * Kwota brutto
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("brutto")
     * @JMS\Groups({"response"})
     */
    private $brutto;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("total_composed")
     * @JMS\Groups({"response"})
     */
    private $totalComposed;

    /**
     * Metoda kasowa - 0, 1
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("schema_vat_cashbox")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $schemaVatCashbox;

    /**
     * WNT - 0, 1
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("wnt")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $wnt;

    /**
     * Metoda płatności cash, transfer, compensation, cod, payment_card
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("payment_method")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $paymentMethod;

    /**
     * Kwota zapłacona
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("alreadypaid")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $alreadyPaid;

    /**
     * Kwota niezapłacona
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("remaining")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $remaining;

    /**
     * Waluta np. PLN
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("currency")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $currencySymbol;

    /**
     * simple - informacje o ilości w prostym katalogu produktów, extended - informacje o ilości przy włączonym module magazynowym
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("warehouse_type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $warehouseType;

    /**
     * Import usług - 0, 1
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("service_import")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $serviceImport;

    /**
     * Import usług art.28b - 0, 1
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("service_import2")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $serviceImport2;

    /**
     * Import towarów art. 33a - 0, 1
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("cargo_import")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $cargoImport;

    /**
     * Draft wydatku - 0, 1
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("draft")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $draft;

    /**
     * @var ContractorId
     * @JMS\Type("Webit\WFirmaSDK\Contractors\ContractorId")
     * @JMS\SerializedName("contractor")
     * @JMS\Groups({"response"})
     */
    private $contractorId;

    /**
     * @var ContractorDetail
     * @JMS\Type("Webit\WFirmaSDK\Invoices\ContractorDetail")
     * @JMS\SerializedName("contractor_detail")
     * @JMS\Groups({"response"})
     */
    private $contractorDetail;

    // TODO - other in xml
    private $type_of_sale;
    private $vat_buyer;
    private $invoice_external_hash;
    private $correction;
    private $correction_description;
    private $corrections;
    private $currency_exchange;
    private $currency_exchange_vat;
    private $paymentstate;
    private $ledger_auto;
    private $notes;
    private $documents;
    private $is_rejected;

    /**
     * @var TagIds
     * @JMS\Type("Webit\WFirmaSDK\Tags\TagIds")
     * @JMS\SerializedName("tags")
     * @JMS\Groups({"response"})
     */
    private $tags;

    /**
     * @var ExpensePart[]
     * @JMS\SerializedName("expense_parts")
     * @JMS\Type("array<Webit\WFirmaSDK\Expenses\ExpensePart>")
     * @JMS\XmlList(entry="expense_part")
     * @JMS\Groups({"response"})
     */
    private $expenseParts;

    public function __construct()
    {
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|ExpenseId
     */
    public function id()
    {
        return ExpenseId::create($this->plainId());
    }

    /**
     * 
     * @return string 
     */
    public function fullNumber()
    {
        return $this->fullNumber;
    }

    /**
     * @return \DateTime
     */
    public function issueDate()
    {
        return $this->date;
    }

    /**
     * @return \DateTime
     */
    public function receptionDate()
    {
        return $this->receptionDate;
    }

    /**
     * @return \DateTime
     */
    public function taxregisterDate()
    {
        return $this->taxRegisterDate;
    }

    /**
     * @return \DateTime
     */
    public function vatRegisterDate()
    {
        return $this->vatRegisterDate;
    }

    /**
     * @return \DateTime
     */
    public function paymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @return bool
     */
    public function splitPayment(): bool
    {
        return (bool)$this->splitPayment;
    }

    /**
     * 
     * @return PaymentMethod 
     */
    public function paymentMethod(): PaymentMethod
    {
        return PaymentMethod::fromString($this->paymentMethod);
    }

    /**
     * @return Currency
     */
    public function currencySymbol()
    {
        return new Currency(
            $this->currencySymbol
        );
    }

    /**
     * 
     * @return float 
     */
    public function netto()
    {
        return $this->netto;
    }

    /**
     * 
     * @return float 
     */
    public function brutto()
    {
        return $this->brutto;
    }

    /**
     * 
     * @return float 
     */
    public function totalComposed()
    {
        return $this->totalComposed;
    }

    /**
     * @return null|ContractorId
     */
    public function contractorId(): ?ContractorId
    {
        if ($this->contractorId) {
            return $this->contractorId;
        }
        return null;
    }

    /**
     * @return TagIds
     */
    public function tags()
    {
        return $this->tags ?: new TagIds();
    }

    /**
     * 
     * @return ExpensePart[] 
     */
    public function expenseParts()
    {
        return $this->expenseParts;
    }
}
