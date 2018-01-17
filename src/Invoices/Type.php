<?php

namespace Webit\WFirmaSDK\Invoices;

final class Type
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
     * @return Type
     */
    public static function vat()
    {
        return new self('normal');
    }

    /**
     * @return Type
     */
    public static function proformaVat()
    {
        return new self('proforma');
    }

    /**
     * @return Type
     */
    public static function offerVat()
    {
        return new self('offer');
    }

    /**
     * @return Type
     */
    public static function nonFiscalReceiptVat()
    {
        return new self('receipt_normal');
    }

    /**
     * @return Type
     */
    public static function receiptVat()
    {
        return new self('receipt_fiscal_normal');
    }

    /**
     * @return Type
     */
    public static function otherIncomeVat()
    {
        return new self('income_normal');
    }

    /**
     * @return Type
     */
    public static function bill()
    {
        return new self('bill');
    }

    /**
     * @return Type
     */
    public static function proformaBill()
    {
        return new self('proforma_bill');
    }

    /**
     * @return Type
     */
    public static function offerBill()
    {
        return new self('offer_bill');
    }

    /**
     * @return Type
     */
    public static function nonFiscalReceiptBill()
    {
        return new self('receipt_bill');
    }

    /**
     * @return Type
     */
    public static function receiptBill()
    {
        return new self('receipt_fiscal_bill');
    }

    /**
     * @return Type
     */
    public static function otherIncomeBill()
    {
        return new self('income_bill');
    }

    /**
     * @param string $type
     * @return Type
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