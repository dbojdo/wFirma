<?php

namespace Webit\WFirmaSDK\Entity;

use Webit\WFirmaSDK\CompanyAccounts\CompanyAccountsApi;
use Webit\WFirmaSDK\Contractors\ContractorsApi;
use Webit\WFirmaSDK\DeclarationCountries\DeclarationCountriesApi;
use Webit\WFirmaSDK\InvoiceDeliveries\InvoiceDeliveriesApi;
use Webit\WFirmaSDK\InvoiceDescriptions\InvoiceDescriptionsApi;
use Webit\WFirmaSDK\Invoices\InvoicesApi;
use Webit\WFirmaSDK\Notes\NotesApi;
use Webit\WFirmaSDK\Payments\PaymentsApi;
use Webit\WFirmaSDK\Series\SeriesApi;
use Webit\WFirmaSDK\Tags\TagsApi;
use Webit\WFirmaSDK\TranslationLanguages\TranslationLanguagesApi;
use Webit\WFirmaSDK\Vat\VatCodesApi;

class ModuleApiFactory
{
    /** @var EntityApi */
    private $entityApi;

    public function __construct(EntityApi $entityApi)
    {
        $this->entityApi = $entityApi;
    }

    /**
     * @return ContractorsApi
     */
    public function contractorsApi()
    {
        return new ContractorsApi($this->entityApi);
    }

    /**
     * @return InvoicesApi
     */
    public function invoicesApi()
    {
        return new InvoicesApi($this->entityApi);
    }

    /**
     * @return TagsApi
     */
    public function tagsApi()
    {
        return new TagsApi($this->entityApi);
    }

    /**
     * @return CompanyAccountsApi
     */
    public function companyAccountsApi()
    {
        return new CompanyAccountsApi($this->entityApi);
    }

    /**
     * @return DeclarationCountriesApi
     */
    public function declarationCountriesApi()
    {
        return new DeclarationCountriesApi($this->entityApi);
    }

    /**
     * @return InvoiceDeliveriesApi
     */
    public function invoiceDeliveriesApi()
    {
        return new InvoiceDeliveriesApi($this->entityApi);
    }

    /**
     * @return InvoiceDescriptionsApi
     */
    public function invoiceDescriptionsApi()
    {
        return new InvoiceDescriptionsApi($this->entityApi);
    }

    /**
     * @return NotesApi
     */
    public function notesApi()
    {
        return new NotesApi($this->entityApi);
    }

    /**
     * @return PaymentsApi
     */
    public function paymentsApi()
    {
        return new PaymentsApi($this->entityApi);
    }

    /**
     * @return SeriesApi
     */
    public function seriesApi()
    {
        return new SeriesApi($this->entityApi);
    }

    /**
     * @return TranslationLanguagesApi
     */
    public function translationLanguagesApi()
    {
        return new TranslationLanguagesApi($this->entityApi);
    }

    /**
     * @return VatCodesApi
     */
    public function vatCodesApi()
    {
        return new VatCodesApi($this->entityApi);
    }
}
