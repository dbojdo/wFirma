<?php

namespace Webit\WFirmaSDK\Entity;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractEntity implements Entity
{
    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     * @JMS\Groups({"response"})
     */
    private $id;

    /**
     * @var Error[]
     * @JMS\SerializedName("errors")
     * @JMS\Type("array<Webit\WFirmaSDK\Entity\Error>")
     * @JMS\XmlList(entry="error")
     * @JMS\Groups({"addResponse", "editResponse"})
     */
    private $errors = array();

    /**
     * @return int
     */
    protected function plainId()
    {
        return $this->id;
    }

    /**
     * @return Error[]
     */
    public function errors()
    {
        return $this->errors;
    }
}
