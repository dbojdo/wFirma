<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser;

use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\JMS\JmsApiSerialiser;
use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\JMS\SerializerFactory;
use Webit\WFirmaSDK\Module;

class ApiSerialiserFactory
{
    /** @var string */
    private $timezone;

    /**
     * @param string $timezone
     */
    public function __construct($timezone = null)
    {
        $this->timezone = $timezone ?: 'Europe/Warsaw';
    }

    /**
     * @return ApiSerialiser
     */
    public function create()
    {
        $serializerFactory = new SerializerFactory($this->timezone);

        $jmsSerialiser = new JmsApiSerialiser($serializerFactory->create());

        $byModuleAndActionSerialiser = new ByModuleAndActionApiSerialiser();
        $byModuleAndActionSerialiser->registerSerialiser(
            new FallingBackApiSerialiser(
                $jmsSerialiser,
                new FileResponseSerialiser()
            ),
            Module::invoices()->name(),
            'download'
        );

        return new EmptyRequestApiSerialiser(
            new FallingBackApiSerialiser(
                $byModuleAndActionSerialiser,
                $jmsSerialiser
            )
        );
    }
}
