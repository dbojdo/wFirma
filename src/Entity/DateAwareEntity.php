<?php

namespace Webit\WFirmaSDK\Entity;

use JMS\Serializer\Annotation as JMS;

abstract class DateAwareEntity extends AbstractEntity
{
    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("created")
     * @JMS\Groups({"response"})
     */
    private $created;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("created")
     * @JMS\Groups({"response"})
     */
    private $modified;

    /**
     * @return \DateTime
     */
    public function created()
    {
        return $this->created;
    }

    /**
     * @return \DateTime
     */
    public function modified()
    {
        return $this->modified;
    }
}
