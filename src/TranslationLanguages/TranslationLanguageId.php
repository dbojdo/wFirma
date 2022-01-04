<?php

namespace Webit\WFirmaSDK\TranslationLanguages;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\AbstractEntityId;

/**
 * Represents the ID of the Translation Language used by wFirma API
 *
 * @JMS\XmlRoot("translation_language")
 */
final class TranslationLanguageId extends AbstractEntityId
{
}
