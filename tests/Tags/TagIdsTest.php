<?php

namespace Webit\WFirmaSDK\Tags;

use JMS\Serializer\SerializerInterface;
use Webit\WFirmaSDK\AbstractTestCase;

class TagIdsTest extends AbstractTestCase
{
    /** @var SerializerInterface */
    private $serialiser;

    protected function setUp(): void
    {
        $this->serialiser = $this->jmsSerializer();
    }

    /**
     * @test
     */
    public function it_creates_an_instance_with_tag_id()
    {
        $tagIds = new TagIds();

        $this->assertEquals(
            new TagIds(array(TagId::create(123))),
            $tagIds->withTagId(TagId::create(123))
        );
    }

    /**
     * @test
     */
    public function it_creates_an_instance_without_tag_id()
    {
        $tagIds = new TagIds(
            array(
                TagId::create(123),
                TagId::create(321)
            )
        );

        $this->assertEquals(
            new TagIds(array(TagId::create(321))),
            $tagIds->withoutTagId(TagId::create(123))
        );
    }

    /**
     * @test
     */
    public function it_is_traversable()
    {
        $ids = array();

        $tagIds = new TagIds(
            array(
                $ids[] = TagId::create(123),
                $ids[] = TagId::create(321)
            )
        );

        foreach ($tagIds as $i => $tagId) {
            $this->assertEquals($ids[$i], $tagId);
        }
    }

    /**
     * @test
     */
    public function it_is_countable()
    {
        $tagIds = new TagIds(
            array(
                $ids[] = TagId::create(123),
                $ids[] = TagId::create(321)
            )
        );

        $this->assertEquals(2, count($tagIds));
    }

    /**
     * @test
     */
    public function testSerialisation()
    {
        $ids = new TagIds(array(
            TagId::create('123'),
            TagId::create('321')
        ));


        $expectedXml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<tags>(123),(321)</tags>

XML;

        $this->assertEquals($expectedXml, $this->serialiser->serialize($ids, 'xml'));
    }

    /**
     * @test
     */
    public function testDeserialisation()
    {
        $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<tags>(123),(321)</tags>
XML;
        $expectedIds = new TagIds(array(
            TagId::create('123'),
            TagId::create('321')
        ));

        $this->assertEquals(
            $expectedIds,
            $this->serialiser->deserialize($xml, 'Webit\WFirmaSDK\Tags\TagIds', 'xml')
        );
    }
}
