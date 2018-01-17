<?php

namespace Webit\WFirmaSDK\Entity;

abstract class AbstractResponse
{
    /**
     * @var Status
     * @JMS\SerializedName("status")
     * @JMS\Type("Webit\WFirmaSDK\Entity\Status")
     */
    private $status;

    /**
     * @param Status $status
     */
    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    /**
     * @return Status
     */
    public function status()
    {
        return $this->status;
    }
}