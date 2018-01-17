<?php

namespace Webit\WFirmaSDK\TranslationLanguages;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\DateAwareEntity;

/**
 * @JMS\XmlRoot("translation_language")
 */
final class TranslationLanguage extends DateAwareEntity
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
     * @var string
     * @JMS\Type("integer")
     * @JMS\SerializedName("active")
     * @JMS\Groups({"response"})
     */
    private $active;

    private function __construct()
    {
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|TranslationLanguageId
     */
    public function id()
    {
        return TranslationLanguageId::create($this->plainId());
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
     * @return string
     */
    public function active()
    {
        return (bool)$this->active;
    }
}