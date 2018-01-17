<?php

namespace Webit\WFirmaSDK\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("error")
 */
final class Error
{
    /**
     * @var string
     * @JMS\SerializedName("field")
     * @JMS\Type("string")
     * @JMS\Groups({"response"})
     */
    private $field;

    /**
     * @var string
     * @JMS\SerializedName("message")
     * @JMS\Type("string")
     * @JMS\Groups({"response"})
     */
    private $message;

    /**
     * @var ErrorMethod
     * @JMS\SerializedName("method")
     * @JMS\Type("Webit\WFirmaSDK\Entity\ErrorMethod")
     * @JMS\Groups({"response"})
     */
    private $method;

    /**
     * @param string $field
     * @param string $message
     * @param ErrorMethod $method
     */
    public function __construct($field, $message, ErrorMethod $method = null)
    {
        $this->field = $field;
        $this->message = $message;
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function field()
    {
        return $this->field;
    }

    /**
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * @return ErrorMethod
     */
    public function method()
    {
        return $this->method;
    }
}
