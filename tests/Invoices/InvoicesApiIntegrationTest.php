<?php

namespace Webit\WFirmaSDK\Invoices;

use Webit\WFirmaSDK\Contractors\ContractorsApi;
use Webit\WFirmaSDK\Contractors\TaxIdType;
use Webit\WFirmaSDK\Entity\AbstractApiTestCase;
use Webit\WFirmaSDK\Contractors\Contractor;
use Webit\WFirmaSDK\Entity\Exception\NotFoundException;
use Webit\WFirmaSDK\Entity\Parameters\Conditions;
use Webit\WFirmaSDK\Entity\Parameters\Fields;
use Webit\WFirmaSDK\Entity\Parameters\Order;
use Webit\WFirmaSDK\Entity\Parameters\Pagination;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;

class InvoicesApiIntegrationTest extends AbstractApiTestCase
{
    use InvoiceStubTrait;

    /** @var InvoicesApi */
    private $api;

    /** @var Invoice[] */
    private $invoices = array();

    /** @var Contractor[] */
    private $contractors = array();

    protected function setUp()
    {
        $this->api = $this->invoicesApi();
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
            $this->newInvoice()
        );

        $this->assertInstanceOf('Webit\WFirmaSDK\Invoices\Invoice', $createdInvoice);
    }


    /**
     * @test
     */
    public function testEdit()
    {
        $this->invoices[] = $createdInvoice = $this->api->add(
            $this->newInvoice()
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
            $this->newInvoice()
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

    /**
     * @test
     */
    public function testFindWithConditions()
    {
        $invoices = $this->api->find(
            Parameters::findParameters(
                Conditions::and(
                    Conditions::ge('date', '2021-06-27'),
                    Conditions::le('date', '2021-06-30')
                ),
                Order::ascending('id'),
                Pagination::create(10),
                Fields::fromArray(['id', 'netto', 'date'])
            )
        );

        $this->assertIsArray($invoices);
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
