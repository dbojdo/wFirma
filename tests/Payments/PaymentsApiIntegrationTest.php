<?php

namespace Webit\WFirmaSDK\Payments;

use Webit\WFirmaSDK\Entity\AbstractApiTestCase;
use Webit\WFirmaSDK\Entity\Exception\NotFoundException;
use Webit\WFirmaSDK\Invoices\Invoice;
use Webit\WFirmaSDK\Invoices\InvoicesApi;
use Webit\WFirmaSDK\Invoices\InvoiceStubTrait;

class PaymentsApiIntegrationTest extends AbstractApiTestCase
{
    use InvoiceStubTrait;

    /** @var PaymentsApi */
    private $api;

    /** @var Payment[] */
    private $payments = array();

    /** @var Invoice[] */
    private $invoices = array();

    protected function setUp(): void
    {
        $this->api = new PaymentsApi($this->entityApi());
    }

    protected function tearDown(): void
    {
        foreach($this->payments as $payment) {
            $this->api->delete($payment->id());
        }

        $invoicesApi = new InvoicesApi($this->entityApi());
        foreach ($this->invoices as $invoice) {
            $invoicesApi->delete($invoice->id());
        }
    }

    /**
     * @test
     */
    public function testAdd()
    {
        $this->payments[] = $createdPayment = $this->api->add(
            $this->newPayment('PLN', PaymentAmount::forPlnAccount(200))
        );

        $this->assertInstanceOf('Webit\WFirmaSDK\Payments\Payment', $createdPayment);
    }

    /**
     * @test
     */
    public function testEdit()
    {
        $this->payments[] = $createdPayment = $this->api->add(
            $this->newPayment()
        );

        $this->assertInstanceOf('Webit\WFirmaSDK\Payments\Payment', $createdPayment);

        /** @var Payment $createdPayment */
        $amount = $this->faker()->randomFloat(2, 0.01, $createdPayment->amount()->value());
        $createdPayment->changeAmount(PaymentAmount::forPlnAccount($amount));
        $createdPayment->changeDate(date_create('now +1 day'));
        $createdPayment->changePaymentMethod(PaymentMethod::paymentCard());

        $this->api->edit($createdPayment);
    }

    /**
     * @test
     */
    public function testDelete()
    {
        $createdPayment = $this->api->add(
            $this->newPayment()
        );
        $this->api->delete($createdPayment->id());

        try {
            $this->api->get($createdPayment->id());
        } catch (NotFoundException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->assertTrue(false, 'Payment still exists.');
    }

    /**
     * @test
     */
    public function testGet()
    {
        $this->payments[] = $createdPayment = $this->api->add($this->newPayment());

        $payment = $this->api->get($createdPayment->id());

        $this->assertInstanceOf('Webit\WFirmaSDK\Payments\Payment', $payment);
        $this->assertEquals($createdPayment->id(), $payment->id());
    }

    /**
     * @return Payment
     */
    private function newPayment($invoiceCurrency = 'PLN', ?PaymentAmount $paymentAmount = null): Payment
    {
        /** @var Invoice $invoice */
        $this->invoices[] = $invoice = $this->invoicesApi()->add($this->newInvoice(null, $invoiceCurrency));

        return Payment::forInvoice(
            $invoice,
            $paymentAmount ?? PaymentAmount::forPlnAccount($invoice->totals()->original()),
            new \DateTime(),
            PaymentMethod::transfer()
        );
    }
}
