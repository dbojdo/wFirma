<?php

namespace Webit\WFirmaSDK\Invoices;

final class Correction
{
    /** @var string */
    private $type;

    /** @var int */
    private $number;

    /** @var int */
    private $formalDataNumber;

    /**
     * @param string $type
     * @param int $number
     * @param int $formalDataNumber
     */
    public function __construct($type, $number, $formalDataNumber)
    {
        $this->type = $type;
        $this->number = (int)$number;
        $this->formalDataNumber = (int)$formalDataNumber;
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->type;
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
    public function formalDataNumber()
    {
        return $this->formalDataNumber;
    }
}