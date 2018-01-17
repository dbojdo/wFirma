<?php

namespace Webit\WFirmaSDK\Invoices;

final class InvoiceNumber
{
    /** @var int */
    private $number;

    /** @var int */
    private $day;

    /** @var int */
    private $month;

    /** @var int */
    private $year;

    /** @var int */
    private $dayYear;

    /** @var string */
    private $fullNumber;

    /** @var string */
    private $semiTemplateNumber;

    /**
     * @param int $number
     * @param int $day
     * @param int $month
     * @param int $year
     * @param int $dayYear
     * @param string $fullNumber
     * @param string $semiTemplateNumber
     */
    private function __construct(
        $number = null,
        $day = null,
        $month = null,
        $year = null,
        $dayYear = null,
        $fullNumber = null,
        $semiTemplateNumber = null
    ) {
        $this->number = $number;
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        $this->fullNumber = $fullNumber;
        $this->semiTemplateNumber = $semiTemplateNumber;
    }

    /**
     * @return int
     */
    public function number()
    {
        return $this->number;
    }

    /**
     * @return int
     */
    public function day()
    {
        return $this->day;
    }

    /**
     * @return int
     */
    public function month()
    {
        return $this->month;
    }

    /**
     * @return int
     */
    public function year()
    {
        return $this->year;
    }

    /**
     * @return int
     */
    public function dayYear()
    {
        return $this->dayYear;
    }

    /**
     * @return string
     */
    public function fullNumber()
    {
        return $this->fullNumber;
    }

    /**
     * @return string
     */
    public function semiTemplateNumber()
    {
        return $this->semiTemplateNumber;
    }

    /**
     * @param string $number
     * @param string $day
     * @param string $month
     * @param string $year
     * @return InvoiceNumber
     */
    public static function newNumber($number, $day, $month, $year)
    {
        return new self($number, $day, $month, $year);
    }

    /**
     * @param string $number
     * @param string $day
     * @param string $month
     * @param string $year
     * @param int $dayYear
     * @param string $fullNumber
     * @param string $semiTemplateNumber
     * @return InvoiceNumber
     */
    public static function existingNumber($number, $day, $month, $year, $dayYear, $fullNumber, $semiTemplateNumber)
    {
        return new self($number, $day, $month, $year, $dayYear, $fullNumber, $semiTemplateNumber);
    }
}
