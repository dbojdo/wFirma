<?php

namespace Webit\WFirmaSDK\InvoiceDeliveries;

use Webit\WFirmaSDK\Entity\DateAwareEntity;
use Webit\WFirmaSDK\Invoices\InvoiceId;

final class InvoiceDelivery extends DateAwareEntity
{
    /**
     * @var InvoiceId
     * @JMS\Type("Webit\WFirmaSDK\Invoices\InvoiceId")
     * @JMS\SerializedName("invoice")
     * @JMS\Groups({"request", "response"})
     */
    private $invoiceId;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("date")
     * @JMS\Groups({"request", "response"})
     */
    private $date;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @JMS\Groups({"response"})
     */
    private $type;

    /**
     * @param InvoiceId $invoiceId
     * @param \DateTime $date
     */
    public function __construct(InvoiceId $invoiceId, \DateTime $date = null)
    {
        $this->invoiceId = $invoiceId;
        $this->date = $date ?: new \DateTime();
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|InvoiceDeliveryId
     */
    public function id()
    {
        return InvoiceDeliveryId::create($this->plainId());
    }

    /**
     * @return InvoiceId
     */
    public function invoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @return \DateTime
     */
    public function date()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->type;
    }
}