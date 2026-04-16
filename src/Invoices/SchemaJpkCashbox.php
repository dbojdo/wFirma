<?php

namespace Webit\WFirmaSDK\Invoices;

final class SchemaJpkCashbox
{
    /** @var string */
    private $schemaJpkCashbox;

    /**
     * @param string $schemaJpkCashbox
     */
    private function __construct($schemaJpkCashbox)
    {
        $this->schemaJpkCashbox = strtolower($schemaJpkCashbox);
    }

    /**
     * @return SchemaJpkCashbox
     */
    public static function enabled()
    {
        return new self('enabled');
    }

    /**
     * @return SchemaJpkCashbox
     */
    public static function disabled()
    {
        return new self('disabled');
    }

    /**
     * @return SchemaJpkCashbox
     */
    public static function disabledManual()
    {
        return new self('disabled_manual');
    }

    /**
     * @param $schemaJpkCashbox
     * @return SchemaJpkCashbox
     * @internal
     */
    public static function fromString($schemaJpkCashbox)
    {
        return new self($schemaJpkCashbox);
    }

    public function __toString()
    {
        return $this->schemaJpkCashbox;
    }
}
