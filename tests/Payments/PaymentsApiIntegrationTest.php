<?php

namespace Webit\WFirmaSDK\Payments;

use DateInterval;
use Webit\WFirmaSDK\Contractors\ContactAddress;
use Webit\WFirmaSDK\Contractors\ContractorsApi;
use Webit\WFirmaSDK\Entity\AbstractApiTestCase;
use Webit\WFirmaSDK\Contractors\Contractor;
use Webit\WFirmaSDK\Contractors\InvoiceAddress;
use Webit\WFirmaSDK\Entity\Exception\NotFoundException;
use Webit\WFirmaSDK\Invoices\Invoice;
use Webit\WFirmaSDK\Invoices\InvoicesApi;
use Webit\WFirmaSDK\Invoices\InvoicesContent;
use Webit\WFirmaSDK\Invoices\Type;
use Webit\WFirmaSDK\Series\SeriesId;

class PaymentsApiIntegrationTest extends AbstractApiTestCase
{
    /** @var PaymentsApi */
    private $api;

    /** @var Payment[] */
    private $payments = array();

    /** @var Invoices[] */
    private $invoices = array();
    
    /** @var Contractors[] */
    private $contractors = array();

    protected function setUp()
    {
        $this->api = new PaymentsApi($this->entityApi());
    }

    protected function tearDown()
    {
        foreach($this->payments as $payment) {
            $this->api->delete($payment->id());
        }

        $invoicesApi = new InvoicesApi($this->entityApi());
        foreach ($this->invoices as $invoice) {
            $invoicesApi->delete($invoice->id());
        }

        $contractorsApi = new ContractorsApi($this->entityApi());
        foreach ($this->contractors as $contractor) {
            $contractorsApi->delete($contractor->id());
        }
    }

    /**
     * @test
     */
    public function testAdd()
    {
        $this->payments[] = $createdPayment = $this->api->add(
            $invoice = $this->newPayment()
        );

        $this->assertInstanceOf('Webit\WFirmaSDK\Payments\Payment', $createdPayment);
    }


    /**
     * @test
     */
    public function testEdit()
    {
        $this->payments[] = $createdPayment = $this->api->add(
            $payment = $this->newPayment()
        );

        $this->assertInstanceOf('Webit\WFirmaSDK\Payments\Payment', $createdPayment);

        /** @var Payment $createdPayment */
        $createdPayment->value(0.01);
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
            $payment = $this->newPayment()
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
        $createdPayment = $this->api->add($this->newPayment());

        $payment = $this->api->get($createdPayment->id());

        $this->assertInstanceOf('Webit\WFirmaSDK\Payments\Payment', $payment);
        $this->assertEquals($createdPayment->id(), $payment->id());
    }

    /**
     * @return Payment
     */
    private function newPayment()
    {
        /** @var Invoice $invoice */
        $invoice = $this->createInvoice();
        return Payment::forInvoice(
            $invoice,
            $invoice->totals()->original(),
            null,
            PaymentMethod::transfer()
        );
    }

    /**
     * @return Invoice
     */
    private function newInvoice(SeriesId $seriesId = null)
    {
        $invoice = Invoice::forContractor(
            $this->newContractor(),
            \Webit\WFirmaSDK\Invoices\Payment::create(
                PaymentMethod::transfer()
            ),
            Type::vat(),
            $seriesId,
            date_create('now')
        );

        $invoice->addInvoiceContent(
            $this->newInvoiceContent()
        );

        $invoice->addInvoiceContent(
            $this->newInvoiceContent()
        );

        return $invoice;
    }

    /**
     * @return InvoicesContent
     */
    private function newInvoiceContent()
    {
        return InvoicesContent::fromName(
            $this->faker()->colorName,
            'szt.',
            mt_rand(1, 5),
            $this->faker()->randomFloat(2, 100, 1000),
            23
        );
    }

    /**
     * @return Invoice|\Webit\WFirmaSDK\Entity\Entity
     */
    private function createInvoice()
    {
        $i = new InvoicesApi($this->entityApi());
        return $this->invoices[] = $i->add($this->newInvoice());
    }

    /**
     * @return Contractor
     */
    private function newContractor()
    {
        return new Contractor(
            $this->faker()->company,
            null,
            '1234563218',
            null,
            new InvoiceAddress(
                $this->faker()->streetAddress,
                $this->faker()->postcode,
                $this->faker()->city,
                'PL'
            ),
            new ContactAddress(
                $this->faker()->company,
                $this->faker()->streetAddress,
                $this->faker()->postcode,
                $this->faker()->city,
                'PL',
                $this->faker()->name
            )
        );
    }
}
