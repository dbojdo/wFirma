<?php

namespace Webit\WFirmaSDK\Expenses;

use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("expense_part")
 */
final class ExpensePart extends DateAwareEntity
{

    /**
     * Typ dokumentu - invoice_cost, invoice_purchase_trade_goods, invoice_vehicle_fuel, invoice_vehicle_expense
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("schema")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $schema;

    /**
     * Kwota brutto
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("brutto")
     * @JMS\Groups({"response"})
     */
    private $brutto;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("price_type")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $priceType;

    /**
     * Szczegółowe pozycje kosztu, jeśli zostaną dodane podczas jego księgowania
     * @var ExpensePartContent[]
     * JMS\SerializedName("expense_part_contents")
     * JMS\Type("array<Webit\WFirmaSDK\Expenses\ExpensePartContent>")
     * JMS\XmlList(entry="expense_part_content")
     * JMS\Groups({"response"})
     */
    private $expensePartContents;

    /**
     * @var ExpensePartVatContent[]
     * JMS\SerializedName("expense_part_vat_contents")
     * JMS\Type("array<Webit\WFirmaSDK\Expenses\ExpensePartVatContent>")
     * JMS\XmlList(entry="expense_part_vat_content")
     * JMS\Groups({"response"})
     */
    private $expensePartVatContents;


    // TODO - other in xml
    private $vatregister_date;
    private $vatregister_netto;
    private $vatregister_tax;
    private $vatregister_before_proportion_tax;
    private $vatregister_proportion_type;
    private $vatregister_proportion;
    private $taxregister_date;
    private $taxregister_expense;
    private $taxregister_expense_purchase;
    private $taxregister_expense_purchase_cost;
    private $taxregister_expense_odd;
    private $taxregister_accrual;
    private $taxregister_accrual_start;
    private $taxregister_accrual_stop;
    private $taxregister_vehicle_run;
    private $description;
    private $positions;


    public function __construct()
    {
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|ExpensePartId
     */
    public function id()
    {
        return ExpensePartId::create($this->plainId());
    }

    /**
     * 
     * @return float 
     */
    public function brutto()
    {
        return $this->brutto;
    }

    /**
     * 
     * @return string 
     */
    public function priceType()
    {
        return $this->priceType;
    }
}
