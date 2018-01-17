<?php

namespace Webit\WFirmaSDK\InvoiceDeliveries;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

class InvoiceDeliveriesApi
{
    /** @var EntityApi */
    private $entityApi;

    public function __construct(EntityApi $entityApi)
    {
        $this->entityApi = $entityApi;
    }

    /**
     * @param InvoiceDelivery $invoiceDelivery
     * @return \Webit\WFirmaSDK\Entity\Entity|InvoiceDelivery
     */
    public function add(InvoiceDelivery $invoiceDelivery)
    {
        return $this->entityApi->add($invoiceDelivery);
    }

    /**
     * @param InvoiceDeliveryId $id
     */
    public function delete(InvoiceDeliveryId $id)
    {
        $this->entityApi->delete($id->id(), Module::invoiceDeliveries());
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|InvoiceDelivery[]
     */
    public function find(Parameters $parameters = null)
    {
        return $this->entityApi->find(Module::invoiceDeliveries(), $parameters);
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|\Webit\WFirmaSDK\Entity\EntityIterator|InvoiceDelivery[]
     */
    public function findAll(Parameters $parameters = null)
    {
        return $this->entityApi->findAll(Module::invoiceDeliveries(), $parameters);
    }

    /**
     * @param InvoiceDeliveryId $id
     * @return \Webit\WFirmaSDK\Entity\Entity|InvoiceDelivery
     */
    public function get(InvoiceDeliveryId $id)
    {
        return $this->entityApi->get($id->id(), Module::invoiceDeliveries());
    }

    /**
     * @param Parameters|null $parameters
     * @return int
     */
    public function count(Parameters $parameters = null)
    {
        return $this->entityApi->count(Module::invoiceDeliveries(), $parameters);
    }
}