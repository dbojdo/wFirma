<?php

namespace Webit\WFirmaSDK\Contractors;

final class TaxIdType
{
    /** @var string */
    private $type;

    /**
     * @param string $type
     */
    private function __construct($type)
    {
        $this->type = strtolower($type);
    }

    /**
     * @return TaxIdType
     */
    public static function nip()
    {
        return new self('nip');
    }

    /**
     * @return TaxIdType
     */
    public static function vat()
    {
        return new self('vat');
    }

    /**
     * @return TaxIdType
     */
    public static function pesel()
    {
        return new self('pesel');
    }

    /**
     * @return TaxIdType
     */
    public static function regon()
    {
        return new self('regon');
    }

    /**
     * @return TaxIdType
     */
    public static function custom()
    {
        return new self('custom');
    }

    /**
     * @return TaxIdType
     */
    public static function none()
    {
        return new self('none');
    }

    /**
     * @param string $type
     * @return TaxIdType
     * @internal
     */
    public static function fromString($type)
    {
        return new self($type);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->type;
    }
}
