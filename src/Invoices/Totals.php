<?php

namespace Webit\WFirmaSDK\Invoices;

final class Totals
{
    /** @var float */
    private $original;

    /** @var float */
    private $composed;

    /** @var float */
    private $tax;

    /** @var float */
    private $netto;

    /**
     * @param float $original
     * @param float $composed
     * @param float $tax
     * @param float $netto
     */
    public function __construct($original, $composed, $tax, $netto)
    {
        $this->original = $original;
        $this->composed = $composed;
        $this->tax = $tax;
        $this->netto = $netto;
    }

    /**
     * @return float
     */
    public function original()
    {
        return $this->original;
    }

    /**
     * @return float
     */
    public function composed()
    {
        return $this->composed;
    }

    /**
     * @return float
     */
    public function tax()
    {
        return $this->tax;
    }

    /**
     * @return float
     */
    public function netto()
    {
        return $this->netto;
    }
}