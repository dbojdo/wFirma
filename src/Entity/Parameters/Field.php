<?php

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;

final class Field
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("field")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"findRequest"})
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return (string)$this->name;
    }
}
