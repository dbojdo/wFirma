<?php

namespace Webit\WFirmaSDK\Invoices;

final class InvoicePage
{
    /** @var string */
    private $mode;

    /**
     * @param string $mode
     */
    private function __construct($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return InvoicePage
     */
    public static function all()
    {
        return new self('all');
    }

    /**
     * @return InvoicePage
     */
    public static function invoice()
    {
        return new self('invoice');
    }

    /**
     * @return InvoicePage
     */
    public static function invoiceCopy()
    {
        return new self('invoiceCopy');
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->mode;
    }
}