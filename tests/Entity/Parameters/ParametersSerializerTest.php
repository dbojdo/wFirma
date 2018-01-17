<?php

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Webit\WFirmaSDK\AbstractTestCase;
use Webit\WFirmaSDK\Entity\Parameters\Field;
use Webit\WFirmaSDK\Entity\Parameters\Fields;
use Webit\WFirmaSDK\Entity\Parameters\Order;
use Webit\WFirmaSDK\Entity\Parameters\Pagination;
use Webit\WFirmaSDK\Entity\Parameters\Parameter;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;

class ParametersSerializerTest extends AbstractTestCase
{
    /** @var SerializerInterface */
    private $serializer;

    protected function setUp()
    {
        $this->serializer = $this->jmsSerializer();
    }

    /**
     * @test
     */
    public function it_serialises_find_parameters()
    {
        $parameters = Parameters::findParameters(
            null,
            Order::descending('abc')->thenAscending('cba'),
            new Pagination(10, 2),
            Fields::fromArray(array(
                new Field('abc'),
                new Field('cba')
            ))
        );

        $expectedXml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<parameters>
  <fields>
    <field>abc</field>
    <field>cba</field>
  </fields>
  <order>
    <desc>abc</desc>
    <asc>cba</asc>
  </order>
  <limit>10</limit>
  <page>2</page>
</parameters>

XML;
        $context = SerializationContext::create();
        $context->setGroups(array('request', 'findRequest'));
        $this->assertEquals($expectedXml, $this->serializer->serialize($parameters, 'xml', $context));
    }


    /**
     * @test
     */
    public function is_serialises_action_parameters()
    {
        $parameters = Parameters::actionParameters(
            array(
                $p1 = new Parameter('DodgerBlue', 'Szymański P.P.O.F'),
                $p2 = new Parameter('DarkOrchid', 'Kamińska s. c.')
            )
        );

        $expectedXml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<parameters>
  <parameter>
    <name>DodgerBlue</name>
    <value><![CDATA[Szymański P.P.O.F]]></value>
  </parameter>
  <parameter>
    <name>DarkOrchid</name>
    <value><![CDATA[Kamińska s. c.]]></value>
  </parameter>
</parameters>

XML;

        $context = SerializationContext::create();
        $context->setGroups(array('request', 'requestAction'));

        $this->assertEquals($expectedXml, $this->serializer->serialize($parameters, 'xml'));
    }

    /**
     * @test
     */
    public function it_deserialises_parameters()
    {
        $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<parameters>
  <limit>10</limit>
  <page>12</page>  
</parameters>
XML;

        $context = DeserializationContext::create();
        $context->setGroups('response');

        $this->assertEquals(
            Parameters::findParameters(null, null, new Pagination(10, 12)),
            $this->serializer->deserialize(
                $xml,
                'Webit\WFirmaSDK\Entity\Parameters\Parameters',
                'xml',
                $context
            )
        );
    }
}
