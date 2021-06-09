<?php

namespace Webit\WFirmaSDK\Payments;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Module;
use Webit\WFirmaSDK\Entity\Entity;

class PaymentsApi
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
     * @param Payment $payment
     * @return Payment|Entity
     */
    public function add(Payment $payment)
    {
        return $this->entityApi->add($payment);
    }

    /**
     * @param Payment $payment
     * @return Payment|Entity
     */
    public function edit(Payment $payment)
    {
        return $this->entityApi->edit($payment);
    }

    /**
     * @param PaymentId $id
     */
    public function delete(PaymentId $id)
    {
        $this->entityApi->delete($id->id(), Module::payments());
    }

    /**
     * @param PaymentId $id
     * @return Payment|Entity
     */
    public function get(PaymentId $id)
    {
        return $this->entityApi->get($id->id(), Module::payments());
    }
}
