<?php

namespace Webit\WFirmaSDK\Vat;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("vat_code_period")
 */
final class VatCodePeriod
{
    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("start")
     * @JMS\Groups({"response"})
     */
    private $start;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("stop")
     * @JMS\Groups({"response"})
     */
    private $stop;

    private function __construct()
    {
    }

    /**
     * @return \DateTime
     */
    public function start()
    {
        return $this->start;
    }

    /**
     * @return \DateTime
     */
    public function stop()
    {
        return $this->stop;
    }
}
