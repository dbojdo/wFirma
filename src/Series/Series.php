<?php

namespace Webit\WFirmaSDK\Series;

use Webit\WFirmaSDK\Entity\AbstractEntity;
use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\EntityId;
use Webit\WFirmaSDK\Invoices\Type;

/**
 * @JMS\XmlRoot("series")
 */
final class Series extends AbstractEntity
{
    /**
     * @var string
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"addRequest", "editRequest", "response"})
     */
    private $name;

    /**
     * @var string
     * @JMS\SerializedName("template")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"addRequest", "editRequest", "response"})
     */
    private $template;

    /**
     * @var int
     * @JMS\SerializedName("initnumber")
     * @JMS\Type("integer")
     * @JMS\Groups({"addRequest", "editRequest", "response"})
     */
    private $initNumber;

    /**
     * @var string
     * @JMS\SerializedName("type")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"addRequest", "response"})
     */
    private $type;

    /**
     * @var string
     * @JMS\SerializedName("reset")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"addRequest", "editRequest", "response"})
     */
    private $resetMode;

    /**
     * @var string
     * @JMS\SerializedName("visibility")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $visibility;

    /**
     * @var \DateTime
     * @JMS\SerializedName("created")
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $created;

    /**
     * @var \DateTime
     * @JMS\SerializedName("modified")
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $modified;

    /**
     * @param string $name
     * @param string $template
     * @param int $initNumber
     * @param Type $type
     * @param ResetMode $resetMode
     */
    public function __construct(
        $name,
        $template,
        Type $type = null,
        $initNumber = 1,
        ResetMode $resetMode = null
    ) {
        $this->name = $name;
        $this->template = $template;
        $this->initNumber = $initNumber;
        $this->type = (string)($type ?: Type::vat());
        $this->resetMode = (string)($resetMode ?: ResetMode::yearly());
    }

    /**
     * @return null|EntityId|SeriesId
     */
    public function id()
    {
        return SeriesId::create($this->plainId());
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Series
     */
    public function rename($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function template()
    {
        return $this->template;
    }

    /**
     * @param string $template
     * @return Series
     */
    public function changeTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return int
     */
    public function initNumber()
    {
        return $this->initNumber;
    }

    /**
     * @param $initNumber
     * @return Series
     */
    public function changeInitNumber($initNumber)
    {
        $this->initNumber = $initNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->type ? Type::fromString($this->type) : null;
    }

    /**
     * @return string
     */
    public function resetMode()
    {
        return $this->resetMode ? ResetMode::fromString($this->resetMode) : null;
    }

    /**
     * @param ResetMode $resetMode
     * @return Series
     */
    public function changeResetMode(ResetMode $resetMode)
    {
        $this->resetMode = (string)$resetMode;
        return $this;
    }

    /**
     * @return string
     */
    public function visibility()
    {
        return $this->visibility;
    }

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
