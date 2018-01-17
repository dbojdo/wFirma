<?php

namespace Webit\WFirmaSDK;

use Faker\Factory;
use Faker\Generator;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\ApiSerialiserFactory;
use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\JMS\SerializerFactory;

abstract class AbstractTestCase extends TestCase
{
    /** @var Generator */
    private $faker;

    /**
     * @return SerializerInterface
     */
    protected function jmsSerializer()
    {
        $serializerFactory = new SerializerFactory();
        return $serializerFactory->create();
    }

    /**
     * @return Entity\Infrastructure\Serialiser\ApiSerialiser
     */
    protected function apiSerialiser()
    {
        $serialiserFactory = new ApiSerialiserFactory();

        return $serialiserFactory->create();
    }

    protected function faker()
    {
        if (!$this->faker) {
            $this->faker = Factory::create('pl_PL');
        }

        return $this->faker;
    }
}