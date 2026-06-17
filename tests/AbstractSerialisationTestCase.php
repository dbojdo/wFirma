<?php

namespace Webit\WFirmaSDK;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use Webit\WFirmaSDK\Entity\Entity;

abstract class AbstractSerialisationTest extends AbstractTestCase
{
    /**
     * @return Module
     */
    abstract protected function module();

    /**
     * @test
     */
    public function testEntityIdSerialisation()
    {
        $module = $this->module();

        $idClass = $module->entityClass() . 'Id';

        $translationLanguageId = new $idClass($id = $this->faker()->randomNumber());

        $context = SerializationContext::create();
        $context->setGroups(array('request'));

        $expectedResult = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<%s>
  <id>%s</id>
</%s>
XML;
        $expectedResult = sprintf($expectedResult, $module->entityName(), $id, $module->entityName());

        $this->assertEquals(
            $expectedResult,
            trim($this->jmsSerializer()->serialize($translationLanguageId, 'xml', $context))
        );
    }

    /**
     * @param string $xml
     * @return array|\JMS\Serializer\scalar|object
     */
    protected function deserialiseEntity($xml)
    {
        $context = DeserializationContext::create();
        $context->setGroups(array('response'));

        /** @var Entity $translationLanguage */
        return $this->jmsSerializer()->deserialize(
            $xml,
            $this->module()->entityClass(),
            'xml',
            $context
        );
    }
}
