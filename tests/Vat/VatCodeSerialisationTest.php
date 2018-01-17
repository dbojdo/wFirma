<?php

namespace Webit\WFirmaSDK\Vat;

use Webit\WFirmaSDK\AbstractSerialisationTest;
use Webit\WFirmaSDK\DeclarationCountries\DeclarationCountryId;
use Webit\WFirmaSDK\Module;

class VatCodeSerialisationTest extends AbstractSerialisationTest
{
    /**
     * @inheritdoc
     */
    protected function module()
    {
        return Module::vatCodes();
    }

    /**
     * @test
     */
    public function vat_code_deserialisation()
    {
        $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<vat_code>
    <id>613</id>
    <label>14%</label>
    <rate>14.00</rate>
    <code></code>
    <type>reduced</type>
    <priority>63</priority>
    <created>2014-10-23 12:39:11</created>
    <modified>2014-10-23 12:39:12</modified>
    <declaration_country>
        <id>170</id>
    </declaration_country>
    <vat_code_periods>
        <vat_code_period>
            <start>2012-01-01</start>
            <stop>2012-12-31</stop>
        </vat_code_period>
    </vat_code_periods>
</vat_code>
XML;

        /** @var VatCode $vatCode */
        $vatCode = $this->deserialiseEntity($xml);

        $this->assertInstanceOf('Webit\WFirmaSDK\Vat\VatCode', $vatCode);
        $this->assertEquals(VatCodeId::create(613), $vatCode->id());
        $this->assertSame('14%', $vatCode->label());
        $this->assertSame(14.00, $vatCode->rate());
        $this->assertSame('', $vatCode->code());
        $this->assertEquals(Type::reduced(), $vatCode->type());
        $this->assertSame(63, $vatCode->priority());
        $this->assertEquals(new DeclarationCountryId(170), $vatCode->declarationCountryId());

        $periods = $vatCode->periods();
        $this->assertEquals(1, count($periods));

        $this->assertEquals(
            \DateTime::createFromFormat('Y-m-d', '2012-01-01', new \DateTimeZone('Europe/Warsaw')),
            $periods[0]->start()
        );

        $this->assertEquals(
            \DateTime::createFromFormat('Y-m-d', '2012-12-31', new \DateTimeZone('Europe/Warsaw')),
            $periods[0]->stop()
        );
    }
}