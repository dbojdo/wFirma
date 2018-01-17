<?php

namespace Webit\WFirmaSDK\InvoiceDescriptions;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

class InvoiceDescriptionsApi
{
    /** @var EntityApi */
    private $entityApi;

    public function __construct(EntityApi $entityApi)
    {
        $this->entityApi = $entityApi;
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|InvoiceDescription[]
     */
    public function find(Parameters $parameters = null)
    {
        return $this->entityApi->find(Module::invoiceDescriptions(), $parameters);
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|\Webit\WFirmaSDK\Entity\EntityIterator|InvoiceDescription[]
     */
    public function findAll(Parameters $parameters = null)
    {
        return $this->entityApi->findAll(Module::invoiceDescriptions(), $parameters);
    }

    /**
     * @param InvoiceDescriptionId $id
     * @return \Webit\WFirmaSDK\Entity\Entity|InvoiceDescription
     */
    public function get(InvoiceDescriptionId $id)
    {
        return $this->entityApi->get($id->id(), Module::invoiceDescriptions());
    }

    /**
     * @param Parameters|null $parameters
     * @return int
     */
    public function count(Parameters $parameters = null)
    {
        return $this->entityApi->count(Module::invoiceDescriptions(), $parameters);
    }
}