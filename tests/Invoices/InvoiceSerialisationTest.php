<?php

namespace Webit\WFirmaSDK\Invoices;

use Webit\WFirmaSDK\AbstractSerialisationTest;
use Webit\WFirmaSDK\Module;
use Webit\WFirmaSDK\Vat\VatContent;

class InvoiceSerialisationTest extends AbstractSerialisationTest
{
    /**
     * @inheritdoc
     */
    protected function module()
    {
        return Module::invoices();
    }

    /**
     * @test
     */
    public function it_deserialises_vat_contents()
    {
        /** @var Invoice $invoice */
        $invoice = $this->deserialiseEntity($this->invoiceXml());

        $vatContents = $invoice->vatContents();
        $this->assertIsArray($vatContents);
        $this->assertCount(2, $vatContents);

        $first = $vatContents[0];
        $this->assertInstanceOf(VatContent::class, $first);
        $this->assertSame(100.00, $first->netto());
        $this->assertSame(23.00, $first->tax());
        $this->assertSame(123.00, $first->brutto());
        $this->assertSame(17, $first->vatCodeId()->id());

        $second = $vatContents[1];
        $this->assertSame(50.00, $second->netto());
        $this->assertSame(0.00, $second->tax());
        $this->assertSame(50.00, $second->brutto());
        $this->assertSame(28, $second->vatCodeId()->id());
    }

    /**
     * @test
     */
    public function it_deserialises_per_line_tax_and_vat_code_id()
    {
        /** @var Invoice $invoice */
        $invoice = $this->deserialiseEntity($this->invoiceXml());

        $contents = $invoice->invoiceContents();
        $this->assertCount(1, $contents);

        $line = $contents[0];
        $this->assertSame(100.00, $line->netto());
        $this->assertSame(123.00, $line->brutto());
        $this->assertSame(23.00, $line->tax());
        $this->assertEquals(10.00, $line->discount()->percent());
        $this->assertSame(17, $line->vatCodeId()->id());
    }

    private function invoiceXml(): string
    {
        return <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<invoice>
    <id>123</id>
    <total>173.00</total>
    <netto>150.00</netto>
    <tax>23.00</tax>
    <invoicecontents>
        <invoicecontent>
            <id>1</id>
            <name>Service</name>
            <count>1</count>
            <price>100.00</price>
            <discount_percent>10.00</discount_percent>
            <netto>100.00</netto>
            <brutto>123.00</brutto>
            <tax>23.00</tax>
            <vat_code>
                <id>17</id>
            </vat_code>
        </invoicecontent>
    </invoicecontents>
    <vat_contents>
        <vat_content>
            <id>10</id>
            <netto>100.00</netto>
            <tax>23.00</tax>
            <brutto>123.00</brutto>
            <vat_code>
                <id>17</id>
            </vat_code>
        </vat_content>
        <vat_content>
            <id>11</id>
            <netto>50.00</netto>
            <tax>0.00</tax>
            <brutto>50.00</brutto>
            <vat_code>
                <id>28</id>
            </vat_code>
        </vat_content>
    </vat_contents>
</invoice>
XML;
    }
}
