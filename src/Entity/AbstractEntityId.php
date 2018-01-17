<?php

namespace Webit\WFirmaSDK\Entity;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractEntityId implements EntityId
{
    /**
     * @var int
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $id;

    /**
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return $this->id == 0;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return (string)$this->id;
    }

    /**
     * @param int|null $id
     * @return null|static
     */
    public static function create($id)
    {
        if ($id === null) {
            return null;
        }

        return new static($id);
    }
}
