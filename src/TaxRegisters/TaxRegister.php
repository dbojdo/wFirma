<?php

namespace Webit\WFirmaSDK\TaxRegisters;

use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("taxregister")
 */
final class TaxRegister extends DateAwareEntity
{
    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("lp")
     * @JMS\Groups({"response"})
     */
    private $lp;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("date")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $date;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("descripion")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $descripion;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("income_sale")
     * @JMS\Groups({"response"})
     */
    private $incomeSale;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("income_odd")
     * @JMS\Groups({"response"})
     */
    private $incomeOdd;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("income")
     * @JMS\Groups({"response"})
     */
    private $income;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("expense_purchase")
     * @JMS\Groups({"response"})
     */
    private $expensePurchase;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("expense_purchase_cost")
     * @JMS\Groups({"response"})
     */
    private $expensePurchaseCost;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("expense_salaries")
     * @JMS\Groups({"response"})
     */
    private $expenseSalaries;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("expense_odd")
     * @JMS\Groups({"response"})
     */
    private $expenseOdd;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("expense")
     * @JMS\Groups({"response"})
     */
    private $expense;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("inventory")
     * @JMS\Groups({"response"})
     */
    private $inventory;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("expense_research_description")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $expenseResearchDescription;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("expense_research")
     * @JMS\Groups({"response"})
     */
    private $expenseResearch;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("annotation")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $annotation;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("expense_correction")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $expenseCorrection;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("contractor_name")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $contractorName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("contractor_address")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Groups({"response"})
     */
    private $contractorAddress;

    /**
     * 
     * @param int $lp 
     * @param \DateTime $date 
     * @param string $name 
     * @param string $descripion 
     * @param float $incomeSale 
     * @param float $incomeOdd 
     * @param float $income 
     * @param float $expensePurchase 
     * @param float $expensePurchase_cost 
     * @param float $expenseSalaries 
     * @param float $expenseOdd 
     * @param float $expense 
     * @param float $inventory 
     * @param string $expenseResearchDescription 
     * @param float $expenseResearch 
     * @param string $annotation 
     * @param float $expenseCorrection 
     * @param string $contractorName 
     * @param string $contractorAddress 
     * @return void 
     */
    public function __construct(
        int $lp,
        \DateTime $date,
        string $name,
        string $descripion = null,
        $incomeSale = null,
        $incomeOdd = null,
        $income = null,
        $expensePurchase = null,
        $expensePurchaseCost = null,
        $expenseSalaries = null,
        $expenseOdd = null,
        $expense = null,
        $inventory = null,
        string $expenseResearchDescription = null,
        $expenseResearch = null,
        string $annotation = null,
        $expenseCorrection = null,
        string $contractorName = null,
        string $contractorAddress = null
    ) {
        $this->lp = $lp;
        $this->date = $date;
        $this->name = $name;
        $this->descripion = $descripion;
        $this->incomeSale = $incomeSale;
        $this->incomeOdd = $incomeOdd;
        $this->income = $income;
        $this->expensePurchase = $expensePurchase;
        $this->expensePurchaseCost = $expensePurchaseCost;
        $this->expenseSalaries = $expenseSalaries;
        $this->expenseOdd = $expenseOdd;
        $this->expense = $expense;
        $this->inventory = $inventory;
        $this->expenseResearchDescription = $expenseResearchDescription;
        $this->expenseResearch = $expenseResearch;
        $this->annotation = $annotation;
        $this->expenseCorrection = $expenseCorrection;
        $this->contractorName = $contractorName;
        $this->contractorAddress = $contractorAddress;
    }

    /**
     * @return null
     */
    public function id()
    {
        return null;
    }

    /**
     * @return int
     */
    public function lp()
    {
        return $this->lp;
    }

    /**
     * @return \DateTime
     */
    public function date(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function descripion()
    {
        return $this->descripion;
    }

    /**
     * @return float
     */
    public function incomeSale()
    {
        return $this->incomeSale;
    }

    /**
     * @return float
     */
    public function incomeOdd()
    {
        return $this->incomeOdd;
    }

    /**
     * @return float
     */
    public function income()
    {
        return $this->income;
    }

    /**
     * @return float
     */
    public function expensePurchase()
    {
        return $this->expensePurchase;
    }

    /**
     * @return float
     */
    public function expensePurchaseCost()
    {
        return $this->expensePurchaseCost;
    }

    /**
     * @return float
     */
    public function expenseSalaries()
    {
        return $this->expenseSalaries;
    }

    /**
     * @return float
     */
    public function expenseOdd()
    {
        return $this->expenseOdd;
    }

    /**
     * @return float
     */
    public function expense()
    {
        return $this->expense;
    }

    /**
     * @return float
     */
    public function inventory()
    {
        return $this->inventory;
    }

    /**
     * @return string
     */
    public function expenseResearchDescription()
    {
        return $this->expenseResearchDescription;
    }

    /**
     * @return float
     */
    public function expenseResearch()
    {
        return $this->expenseResearch;
    }

    /**
     * @return string
     */
    public function annotation()
    {
        return $this->annotation;
    }

    /**
     * @return bool
     */
    public function expenseCorrection(): bool
    {
        return (bool)$this->expenseCorrection;
    }

    /**
     * @return string
     */
    public function contractorName()
    {
        return $this->contractorName;
    }

    /**
     * @return string
     */
    public function contractorAddress()
    {
        return $this->contractorAddress;
    }

}
