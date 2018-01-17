<?php

namespace Webit\WFirmaSDK\Invoices;

use Webit\WFirmaSDK\Contractors\ContactAddress;
use Webit\WFirmaSDK\Contractors\ContractorId;
use Webit\WFirmaSDK\Contractors\ContractorsApi;
use Webit\WFirmaSDK\Contractors\TaxIdType;
use Webit\WFirmaSDK\Entity\AbstractApiTestCase;
use Webit\WFirmaSDK\Contractors\Contractor;
use Webit\WFirmaSDK\Contractors\InvoiceAddress;
use Webit\WFirmaSDK\Entity\Exception\NotFoundException;
use Webit\WFirmaSDK\Series\SeriesId;

class InvoicesApiIntegrationTest extends AbstractApiTestCase
{
    /** @var InvoicesApi */
    private $api;

    /** @var Invoice[] */
    private $invoices = array();

    /** @var Contractor[] */
    private $contractors = array();

    protected function setUp()
    {
        $this->api = new InvoicesApi($this->entityApi());
    }

    protected function tearDown()
    {
        foreach ($this->invoices as $invoice) {
            $this->api->delete($invoice->id());
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
        $this->invoices[] = $createdInvoice = $this->api->add(
            $invoice = $this->newInvoice()
        );

        $this->assertInstanceOf('Webit\WFirmaSDK\Invoices\Invoice', $createdInvoice);
    }

    public function testEdit()
    {
        $this->invoices[] = $createdInvoice = $this->api->add(
            $invoice = $this->newInvoice()
        );

        $this->assertInstanceOf('Webit\WFirmaSDK\Invoices\Invoice', $createdInvoice);

        $createdInvoice->changeContractorWithId($this->createContractor()->id());

        foreach ($createdInvoice->invoiceContents() as $ic) {
            $createdInvoice->removeInvoiceContent($ic);
            break;
        }
        $createdInvoice->addInvoiceContent($this->newInvoiceContent());

        $this->api->edit($createdInvoice);
    }

    /**
     * @test
     */
    public function testDelete()
    {
        $createdInvoice = $this->api->add(
            $invoice = $this->newInvoice()
        );
        $this->api->delete($createdInvoice->id());

        try {
            $this->api->get($createdInvoice->id());
        } catch (NotFoundException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->assertTrue(false, 'Invoice still exists.');
    }

    /**
     * @test
     */
    public function testGet()
    {
        $createdInvoice = $this->api->add($this->newInvoice());

        $gotInvoice = $this->api->get($createdInvoice->id());

        $this->assertInstanceOf('Webit\WFirmaSDK\Invoices\Invoice', $gotInvoice);
        $this->assertEquals($createdInvoice->id(), $gotInvoice->id());
    }

    private function newInvoice(SeriesId $seriesId = null)
    {
        $invoice = Invoice::forContractor(
            $this->newContractor(),
            Payment::create(
                PaymentMethod::transfer(),
                $this->faker()->dateTimeBetween('now', '+30 days')
            ),
            Type::vat(),
            $seriesId,
            $this->faker()->dateTimeBetween('-7 days', 'now')
        );

        $invoice->addInvoiceContent(
            InvoicesContent::fromName(
                $this->faker()->colorName,
                'szt.',
                mt_rand(1, 5),
                $this->faker()->randomFloat(2, 100, 1000),
                23
            )
        );

        $invoice->addInvoiceContent(
            InvoicesContent::fromName(
                $this->faker()->colorName,
                'szt.',
                mt_rand(1, 5),
                $this->faker()->randomFloat(2, 100, 1000),
                23
            )
        );

        return $invoice;
    }

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

    /**
     * @return Contractor|\Webit\WFirmaSDK\Entity\Entity
     */
    private function createContractor()
    {
        $c = new ContractorsApi($this->entityApi());
        $newC = $this->newContractor();
        $newC->changeTaxId(TaxIdType::regon());

        return $this->contractors[] = $c->add($this->newContractor());
    }
}
