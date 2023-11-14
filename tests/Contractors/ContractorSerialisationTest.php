<?php

namespace Contractors;

use JMS\Serializer\SerializationContext;
use Webit\WFirmaSDK\AbstractTestCase;
use Webit\WFirmaSDK\Contractors\Contractor;
use Webit\WFirmaSDK\Tags\TagId;
use Webit\WFirmaSDK\Tags\TagIds;

class ContractorSerialisationTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function itSerialisesTags()
    {
        $contractor = new Contractor(
            $this->faker()->company(),
            $this->faker()->company(),
            null,
            null,
            null,
        null,
        null,
        null,
        true,
        false,
        null,
        null,
        null,
            new TagIds([
                new TagId($tag1 = $this->faker()->word()),
                new TagId($tag2 = $this->faker()->word()),
            ])
        );

        $xmlContractor = $this->jmsSerializer()->serialize($contractor, 'xml', SerializationContext::create()->setGroups(['request', 'response']));

        $this->assertStringContainsString($tag1, $xmlContractor);
        $this->assertStringContainsString($tag2, $xmlContractor);
    }
}