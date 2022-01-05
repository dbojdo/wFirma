<?php

namespace Webit\WFirmaSDK\Contractors;

use Webit\WFirmaSDK\AbstractSerialisationTest;
use Webit\WFirmaSDK\Module;

class ContractorSerialisationTest extends AbstractSerialisationTest
{
    /**
     * @test
     */
    public function itSerialisesCustomFields()
    {
        /** @var Contractor $contractor */
        $contractor = $this->deserialiseEntity(file_get_contents(__DIR__.'/contractor.xml'));
        $this->assertCount(8, $contractor->customFields());

        // TODO: the code below is testing custom fields writing, which is not supported by the API yet
//        $newXml = $this->jmsSerializer()->serialize($contractor, 'xml', SerializationContext::create()->setGroups('request'));
//        $newContractor = $this->deserialiseEntity($newXml);
//
//        $this->assertEquals($contractor->customFields(), $newContractor->customFields());
    }

    protected function module()
    {
        return Module::contractors();
    }
}