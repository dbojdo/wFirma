<?php

namespace Webit\WFirmaSDK\DeclarationCountries;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\AbstractEntityId;

/**
 * Represents the ID of the Declaration Country used by wFirma API
 *
 * @JMS\XmlRoot("declaration_country")
 */
final class DeclarationCountryId extends AbstractEntityId
{
}
