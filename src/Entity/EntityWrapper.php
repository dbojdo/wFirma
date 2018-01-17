<?php

namespace Webit\WFirmaSDK\Entity;

use Webit\WFirmaSDK\Entity\Entity;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use JMS\Serializer\Annotation as JMS;

/**
 * @internal
 */
final class EntityWrapper
{
    /**
     * @var Entity[]
     * @JMS\SerializedName("entities")
     * @JMS\Type("array<Webit\WFirmaSDK\Entity\Entity>")
     * @JMS\XmlList(entry="entity", inline=true)
     * @JMS\Groups({"addRequest", "editRequest", "response"})
     */
    private $entities;

    /**
     * @var Parameters
     * @JMS\SerializedName("parameters")
     * @JMS\Type("Webit\WFirmaSDK\Entity\Parameters\Parameters")
     * @JMS\Groups({"request", "response"})
     */
    private $parameters;

    /**
     * RecordWrapper constructor.
     * @param Entity $entity
     * @param Parameters $parameters
     */
    public function __construct(Entity $entity = null, Parameters $parameters = null)
    {
        $this->entities = $entity ? array($entity) : array();
        $this->parameters = $parameters;
    }

    /**
     * @return Parameters
     */
    public function parameters()
    {
        return $this->parameters ?: Parameters::defaultParameters();
    }

    /**
     * @return Entity
     */
    public function entity()
    {
        return $this->entities ? $this->entities[0] : null;
    }

    /**
     * @return Entity[]
     */
    public function entities()
    {
        return $this->entities;
    }
}
