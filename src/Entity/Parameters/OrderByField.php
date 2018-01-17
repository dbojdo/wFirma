<?php

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;

/**
 * @internal
 */
final class OrderByField
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("asc")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"findRequest"})
     */
    private $asc;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("desc")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"findRequest"})
     */
    private $desc;

    /**
     * @param string $field
     * @return OrderByField
     */
    public static function ascending($field)
    {
        $order = new self();
        $order->asc = $field;

        return $order;
    }

    /**
     * @param string $field
     * @return OrderByField
     */
    public static function descending($field)
    {
        $order = new self();
        $order->desc = $field;

        return $order;
    }
}
