<?php

namespace Webit\WFirmaSDK\Vat\Repository;

use Webit\WFirmaSDK\Entity\AbstractApiTestCase;
use Webit\WFirmaSDK\Vat\VatCodesApi;

class VatCodeIdApiMapProviderTest extends AbstractApiTestCase
{
    /**
     * @test
     */
    public function itUsesApiToGetCodes()
    {
        $provider = new VatCodeIdApiMapProvider(new VatCodesApi($this->entityApi()));

        $this->assertNotEmpty($provider->getMap());
    }
}
