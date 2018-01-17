<?php

namespace Webit\WFirmaSDK\Invoices;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Module;
use Webit\WFirmaSDK\Entity\Entity;

class InvoicesApi
{
    /** @var EntityApi */
    private $entityApi;

    /**
     * @param EntityApi $entityApi
     */
    public function __construct(EntityApi $entityApi)
    {
        $this->entityApi = $entityApi;
    }

    /**
     * @param Invoice $invoice
     * @return Invoice|Entity
     */
    public function add(Invoice $invoice)
    {
        return $this->entityApi->add($invoice);
    }

    /**
     * @param Invoice $invoice
     * @return Entity|Invoice
     */
    public function edit(Invoice $invoice)
    {
        return $this->entityApi->edit($invoice);
    }

    /**
     * @param InvoiceId $id
     */
    public function delete(InvoiceId $id)
    {
        $this->entityApi->delete($id->id(), Module::invoices());
    }

    /**
     * @param InvoiceId $id
     * @return Entity|Invoice
     */
    public function get(InvoiceId $id)
    {
        return $this->entityApi->get($id->id(), Module::invoices());
    }

    public function send(InvoiceId $id, SendParameters $parameters = null)
    {
        $parameters = $parameters ?: new SendParameters();
        $this->entityApi->executeAction(
            Module::invoices(),
            'send',
            $id->id(),
            $parameters->toActionParameters()
        );
    }

    /**
     * @param InvoiceId $id
     * @param DownloadParameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\File
     */
    public function download(InvoiceId $id, DownloadParameters $parameters = null)
    {
        $parameters = $parameters ?: new DownloadParameters();
        $response = $this->entityApi->executeAction(
            Module::invoices(),
            'download',
            $id->id(),
            $parameters->toActionParameters()
        );

        return $response->file();
    }

    /**
     * @param InvoiceId $id
     */
    public function fiscalise(InvoiceId $id)
    {
        $this->entityApi->executeAction(
            Module::invoices(),
            'fiscalize',
            $id->id()
        );
    }

    /**
     * @param InvoiceId $id
     */
    public function unfiscalise(InvoiceId $id)
    {
        $this->entityApi->executeAction(
            Module::invoices(),
            'unfiscalize',
            $id->id()
        );
    }
}
