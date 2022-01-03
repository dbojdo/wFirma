<?php

namespace Webit\WFirmaSDK\DeclarationCountries;

use Webit\WFirmaSDK\Entity\AbstractEntityId;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("declaration_country")
 */
final class DeclarationCountryId extends AbstractEntityId
{
    public static function Poland(): self {
        return self::create(0);
    }
}
