<?php

namespace Webit\WFirmaSDK\Vat;

use Webit\WFirmaSDK\Entity\AbstractApiTestCase;

class VatCodesApiIntegrationTest extends AbstractApiTestCase
{
    /** @var VatCodesApi */
    private $vatCodesApi;

    protected function setUp(): void
    {
        $this->vatCodesApi = new VatCodesApi($this->entityApi());
    }

    /**
     * @test
     */
    public function testFind()
    {
        $vatCodes = $this->vatCodesApi->find(null);
        foreach ($vatCodes as $vatCode) {
            $this->assertInstanceOf('Webit\WFirmaSDK\Vat\VatCode', $vatCode);
        }
    }

    /**
     * @test
     */
    public function testGet()
    {
        $this->assertInstanceOf(
            'Webit\WFirmaSDK\Vat\VatCode',
            $this->vatCodesApi->get(VatCodeId::create(222))
        );
    }

    /**
     * @test
     */
    public function testFindAll()
    {
        $this->assertInstanceOf('Webit\WFirmaSDK\Entity\EntityIterator', $this->vatCodesApi->findAll());
    }

    /**
     * @test
     */
    public function testCount()
    {
        $this->assertInternalType('integer', $this->vatCodesApi->count());
    }
}
