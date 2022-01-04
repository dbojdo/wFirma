<?php

namespace Webit\WFirmaSDK\Vat;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\AbstractEntityId;

/**
 * Represents the ID of the VAT Rate codes used by wFirma API
 *
 * @JMS\XmlRoot("vat_code")
 */
final class VatCodeId extends AbstractEntityId
{
}
