<?php

namespace Webit\WFirmaSDK\Contractors;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\CompanyAccounts\CompanyAccountId;
use Webit\WFirmaSDK\Entity\DateAwareEntity;
use Webit\WFirmaSDK\InvoiceDescriptions\InvoiceDescriptionId;
use Webit\WFirmaSDK\Payments\PaymentMethod;
use Webit\WFirmaSDK\Tags\TagIds;
use Webit\WFirmaSDK\TranslationLanguages\TranslationLanguageId;

/**
 * @JMS\XmlRoot("contractor")
 */
final class Contractor extends DateAwareEntity
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("altname")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $altName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("tax_id_type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $taxIdType;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("nip")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $nip;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("regon")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $regon;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("street")
     * @JMS\Groups({"request", "response"})
     */
    private $street;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("zip")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $zip;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $city;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $country;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("different_contact_address")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $differentContactAddress;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("contact_name")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $contactName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("contact_street")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $contactStreet;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("contact_zip")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $contactZip;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("contact_city")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $contactCity;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("contact_country")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $contactCountry;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("contact_person")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $contactPerson;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $phone;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("skype")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $skype;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("fax")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $fax;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("email")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $email;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("url")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $url;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $description;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("buyer")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $buyer;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("seller")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $seller;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("account_number")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $accountNumber;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("discount_percent")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $discountPercent;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("payment_days")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $paymentDays;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("payment_method")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $paymentMethod;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("remind")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $remind;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("hash")
     * @JMS\Groups({"response"})
     */
    private $hash;

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
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"request", "response"})
     */
    private $tags;

    /**
     * @var TranslationLanguageId
     * @JMS\Type("Webit\WFirmaSDK\TranslationLanguages\TranslationLanguageId")
     * @JMS\SerializedName("translation_language")
     * @JMS\Groups({"request", "response"})
     */
    private $translationLanguageId;

    /**
     * @var CompanyAccountId
     * @JMS\Type("Webit\WFirmaSDK\CompanyAccounts\CompanyAccountId")
     * @JMS\SerializedName("translation_language")
     * @JMS\Groups({"response"})
     */
    private $companyAccountId;

    /**
     * @var InvoiceDescriptionId
     * @JMS\Type("Webit\WFirmaSDK\InvoiceDescriptions\InvoiceDescriptionId")
     * @JMS\SerializedName("translation_language")
     * @JMS\Groups({"response"})
     */
    private $invoiceDescriptionId;

    public function __construct(
        $name,
        $altName = null,
        $nip = null,
        $regon = null,
        InvoiceAddress $invoiceAddress = null,
        ContactAddress $contactAddress = null,
        ContactDetails $contactDetails = null,
        $description = null,
        $buyer = true,
        $seller = false,
        $accountNumber = null,
        PaymentSettings $paymentSettings = null,
        TaxIdType $taxIdType = null,
        TagIds $tags = null,
        TranslationLanguageId $translationLanguageId = null
    ) {
        $this->name = $name;
        $this->altName = $altName;

        $this->nip = $nip;
        $this->regon = $regon;

        $this->taxIdType = $taxIdType ? (string)$taxIdType : $this->resolveTaxIdType();

        if ($invoiceAddress) {
            $this->changeInvoiceAddress($invoiceAddress);
        }

        $this->changeContactAddress($contactAddress);

        if ($contactDetails) {
            $this->changeContactDetails($contactDetails);
        }

        $this->description = $description;
        $this->buyer = (int)$buyer;
        $this->seller = (int)$seller;
        $this->accountNumber = $accountNumber;

        if ($paymentSettings) {
            $this->changePaymentSettings($paymentSettings);
        }

        $this->tags = $tags ?: new TagIds();
        $this->translationLanguageId = $translationLanguageId;
    }

    private function resolveTaxIdType()
    {
        if ($this->nip) {
            return TaxIdType::nip();
        }

        if ($this->regon) {
            return TaxIdType::regon();
        }

        return TaxIdType::none();
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|ContractorId
     */
    public function id()
    {
        return ContractorId::create($this->plainId());
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function altName()
    {
        return $this->altName;
    }

    /**
     * @param string $name
     * @param string $altName
     */
    public function rename($name, $altName)
    {
        $this->name = $name;
        $this->altName = $altName;
    }

    /**
     * @return string
     */
    public function taxIdType()
    {
        return $this->taxIdType;
    }

    /**
     * @param TaxIdType $taxIdType
     */
    public function changeTaxId(TaxIdType $taxIdType)
    {
        $this->taxIdType = (string)$taxIdType;
    }

    /**
     * @return string
     */
    public function nip()
    {
        return $this->nip;
    }

    /**
     * @param string $nip
     */
    public function changeNip($nip)
    {
        $this->nip = $nip;
    }

    /**
     * @return string
     */
    public function regon()
    {
        return $this->regon;
    }

    /**
     * @param string $regon
     */
    public function changeRegon($regon)
    {
        $this->regon = $regon;
    }

    /**
     * @return InvoiceAddress
     */
    public function invoiceAddress()
    {
        return new InvoiceAddress(
            $this->street,
            $this->zip,
            $this->city,
            $this->country
        );
    }

    /**
     * @param InvoiceAddress $invoiceAddress
     */
    public function changeInvoiceAddress(InvoiceAddress $invoiceAddress)
    {
        $this->street = $invoiceAddress->street();
        $this->zip = $invoiceAddress->zip();
        $this->city = $invoiceAddress->city();
        $this->country = $invoiceAddress->country();
    }

    /**
     * @return ContactAddress|null
     */
    public function contactAddress()
    {
        if ($this->differentContactAddress == 0) {
            return null;
        }

        return new ContactAddress(
            $this->contactName,
            $this->contactStreet,
            $this->contactZip,
            $this->contactCity,
            $this->contactCountry,
            $this->contactPerson
        );
    }

    public function changeContactAddress(ContactAddress $contactAddress = null)
    {
        $hasAddress = (bool)$contactAddress;
        if (!$hasAddress) {
            $contactAddress = new ContactAddress();
        }

        $this->differentContactAddress = (int)$hasAddress;
        $this->contactName = $contactAddress->name();
        $this->contactStreet = $contactAddress->street();
        $this->contactZip = $contactAddress->zip();
        $this->contactCity = $contactAddress->city();
        $this->contactCountry = $contactAddress->country();
        $this->contactPerson = $contactAddress->person();
    }

    /**
     * @return ContactDetails
     */
    public function contactDetails()
    {
        return new ContactDetails(
            $this->phone,
            $this->skype,
            $this->fax,
            $this->email,
            $this->url
        );
    }

    /**
     * @param ContactDetails $contactDetails
     */
    public function changeContactDetails(ContactDetails $contactDetails)
    {
        $this->phone = $contactDetails->phone();
        $this->skype = $contactDetails->skype();
        $this->fax = $contactDetails->fax();
        $this->email = $contactDetails->email();
        $this->url = $contactDetails->url();
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function changeDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function buyer()
    {
        return (bool)$this->buyer;
    }

    /**
     * @param bool $buyer
     */
    public function changeBuyer($buyer)
    {
        $this->buyer = (int)$buyer;
    }

    /**
     * @return int
     */
    public function seller()
    {
        return (bool)$this->seller;
    }

    /**
     * @param bool $seller
     */
    public function changeSeller($seller)
    {
        $this->seller = (int)$seller;
    }

    /**
     * @return string
     */
    public function accountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     */
    public function changeAccountNumber($accountNumber)
    {
        $this->accountNumber = (string)$accountNumber;
    }

    /**
     * @return PaymentSettings
     */
    public function paymentSettings()
    {
        return new PaymentSettings(
            $this->paymentDays,
            $this->paymentMethod ? PaymentMethod::fromString($this->paymentMethod) : null,
            $this->discountPercent,
            (bool)$this->remind
        );
    }

    /**
     * @param PaymentSettings $paymentSettings
     */
    public function changePaymentSettings(PaymentSettings $paymentSettings)
    {
        $this->paymentMethod = (string)$paymentSettings->method();
        $this->paymentDays = $paymentSettings->days();
        $this->discountPercent = $paymentSettings->discountPercent();
        $this->remind = (int)$paymentSettings->remind();
    }

    /**
     * @return string
     */
    public function hash()
    {
        return $this->hash;
    }

    /**
     * @return int
     */
    public function notes()
    {
        return $this->notes;
    }

    /**
     * @return int
     */
    public function documents()
    {
        return $this->documents;
    }

    /**
     * @return TagIds
     */
    public function tags()
    {
        return $this->tags ?: new TagIds();
    }

    /**
     * @param TagIds $tagIds
     */
    public function changeTags(TagIds $tagIds)
    {
        $this->tags = $tagIds;
    }

    /**
     * @return TranslationLanguageId
     */
    public function translationLanguageId()
    {
        return $this->translationLanguageId;
    }

    /**
     * @param TranslationLanguageId $translationLanguageId
     */
    public function changeTranslationLanguageId($translationLanguageId)
    {
        $this->translationLanguageId = $translationLanguageId;
    }

    /**
     * @return CompanyAccountId
     */
    public function companyAccountId()
    {
        return $this->companyAccountId;
    }

    /**
     * @return InvoiceDescriptionId
     */
    public function invoiceDescriptionId()
    {
        return $this->invoiceDescriptionId;
    }
}
