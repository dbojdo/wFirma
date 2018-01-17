<?php

namespace Webit\WFirmaSDK\Entity;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;

/**
 * @JMS\XmlRoot("method")
 */
final class ErrorMethod
{
    /**
     * @var string
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     * @JMS\Groups({"response"})
     */
    private $name;

    /**
     * @param string $name
     * @param Parameters $parameters
     */
    public function __construct($name, Parameters $parameters = null)
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
}
