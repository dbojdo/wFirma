<?php

namespace Webit\WFirmaSDK\Notes;

use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Module;

/**
 * @JMS\XmlRoot("note")
 */
final class Note extends DateAwareEntity
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("object_name")
     * @JMS\Groups("response", "addRequest")
     */
    private $objectName;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("object_id")
     * @JMS\Groups("response", "addRequest")
     */
    private $objectId;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("object_name")
     * @JMS\Groups("response", "request")
     */
    private $text;

    /**
     * @param Module $module
     * @param int $objectId
     * @param string $text
     */
    public function __construct(Module $module, $objectId, $text)
    {
        $this->objectName = (string)$module;
        $this->objectId = $objectId;
        $this->text = $text;
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|NoteId
     */
    public function id()
    {
        return NoteId::create($this->plainId());
    }

    /**
     * @return string
     */
    public function objectName()
    {
        return $this->objectName;
    }

    /**
     * @return int
     */
    public function objectId()
    {
        return $this->objectId;
    }

    /**
     * @return string
     */
    public function text()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function changeText($text)
    {
        $this->text = $text;
    }
}