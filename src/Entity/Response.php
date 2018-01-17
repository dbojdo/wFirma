<?php

namespace Webit\WFirmaSDK\Entity;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;

/**
 * @JMS\XmlRoot("api")
 * @internal
 */
final class Response
{
    /**
     * @var Status
     * @JMS\SerializedName("status")
     * @JMS\Type("Webit\WFirmaSDK\Entity\Status")
     * @JMS\Groups({"response"})
     */
    private $status;

    /**
     * @var EntityWrapper
     * @JMS\Type("Webit\WFirmaSDK\Entity\EntityWrapper")
     * @JMS\Groups({"response"})
     */
    private $entityWrapper;

    /**
     * @var File
     * @JMS\Exclude
     */
    private $file;

    /**
     * @param Status $status
     * @param Entity $entity
     */
    public function __construct(Status $status, Entity $entity = null)
    {
        $this->status = $status;
        $this->entityWrapper = new EntityWrapper($entity);
    }

    /**
     * @return Status
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return Entity
     */
    public function entity()
    {
        return $this->entityWrapper ? $this->entityWrapper->entity() : null;
    }

    /**
     * @return Entity[]
     */
    public function entities()
    {
        return $this->entityWrapper ? $this->entityWrapper->entities() : array();
    }

    /**
     * @return Parameters
     */
    public function parameters()
    {
        return $this->entityWrapper ? $this->entityWrapper->parameters() : null;
    }

    /**
     * @return File
     */
    public function file()
    {
        return $this->file;
    }

    /**
     * @param File $file
     * @return Response
     */
    public static function fileResponse(File $file)
    {
        $response = new self(new Status((string)StatusCode::ok()));
        $response->file = $file;

        return $response;
    }
}
