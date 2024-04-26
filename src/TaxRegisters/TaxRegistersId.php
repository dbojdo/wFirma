<?php

namespace Webit\WFirmaSDK\TaxRegisters;

class TaxRegistersId
{

    /**
     * 
     * @var int
     */
    private $year;

    /**
     * 
     * @var int
     */
    private $month;

    /**
     * 
     * @param int $year 
     * @param int|null $month 
     * @return void 
     */
    public function __construct($year, $month = null)
    {
        $this->year = $year;
        $this->month = $month;
    }

    /**
     * Single TaxRegister doesn't have integer id.
     * @return string 
     */
    public function id()
    {
        if (empty($this->month) || $this->month > 12 || $this->month < 1){
            return (string)$this->year;
        }
        else{
            return $this->year . '/' . $this->month;
        }
    }
}
