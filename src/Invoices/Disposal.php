<?php

namespace Webit\WFirmaSDK\Invoices;

final class Disposal
{
    /** @var bool */
    private $dateEmpty;

    /** @var \DateTime */
    private $date;

    /** @var string */
    private $dateFormat;

    public static function withDate(\DateTime $date, $dateFormat = null)
    {
        return new self(false, $date, $dateFormat);
    }

    public static function withEmptyDate()
    {
        return new self(true);
    }

    /**
     * Disposal constructor.
     * @param bool $dateEmpty
     * @param \DateTime $date
     * @param string $dateFormat
     */
    private function __construct($dateEmpty, \DateTime $date = null, $dateFormat = null)
    {
        $this->dateEmpty = $dateEmpty;
        $this->date = $date;
        $this->dateFormat = $dateFormat;
    }

    /**
     * @return bool
     */
    public function dateEmpty()
    {
        return $this->dateEmpty;
    }

    /**
     * @return \DateTime
     */
    public function date()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function dateFormat()
    {
        return $this->dateFormat;
    }
}
