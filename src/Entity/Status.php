<?php

namespace Webit\WFirmaSDK\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("status")
 */
final class Status
{
    /**
     * @var string
     * @JMS\SerializedName("code")
     * @JMS\Type("string")
     * @JMS\Groups({"response"})
     */
    private $code;

    /**
     * @var string
     * @JMS\SerializedName("message")
     * @JMS\Type("string")
     * @JMS\Groups({"response"})
     */
    private $message;

    /**
     * @param string $code
     * @param null $message
     */
    public function __construct($code, $message = null)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function code()
    {
        return $this->code ? StatusCode::fromString($this->code) : null;
    }

    /**
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
