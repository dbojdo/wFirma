<?php

namespace Webit\WFirmaSDK\Invoices;

final class Schema
{
    /** @var string */
    private $schema;

    /**
     * @param string $schema
     */
    private function __construct($schema)
    {
        $this->schema = strtolower($schema);
    }

    /**
     * @return Schema
     */
    public static function normal()
    {
        return new self('normal');
    }

    /**
     * @return Schema
     */
    public static function vatInvoiceDate()
    {
        return new self('vat_invoice_date');
    }

    /**
     * @return Schema
     */
    public static function vatBuyerConstructionService()
    {
        return new self('vat_buyer_construction_service');
    }

    /**
     * @return Schema
     */
    public static function assessor()
    {
        return new self('vat_buyer_construction_service');
    }

    /**
     * @param $schema
     * @return Schema
     * @internal
     */
    public static function fromString($schema)
    {
        return new self($schema);
    }

    public function __toString()
    {
        return $this->schema;
    }
}