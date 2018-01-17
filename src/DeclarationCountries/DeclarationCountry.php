<?php

namespace Webit\WFirmaSDK\DeclarationCountries;

use Webit\WFirmaSDK\Entity\AbstractEntity;
use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\EntityId;

/**
 * @JMS\XmlRoot("declaration_country")
 */
final class DeclarationCountry extends AbstractEntity
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Groups({"response"})
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("code")
     * @JMS\Groups({"response"})
     */
    private $code;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("priority")
     * @JMS\Groups({"response"})
     */
    private $priority;

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

    private function __construct()
    {
    }

    /**
     * @return null|EntityId|DeclarationCountryId
     */
    public function id()
    {
        return DeclarationCountryId::create($this->plainId());
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function code()
    {
        return $this->code;
    }

    /**
     * @return int
     */
    public function priority()
    {
        return $this->priority;
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