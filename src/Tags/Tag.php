<?php

namespace Webit\WFirmaSDK\Tags;

use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("tag")
 */
final class Tag extends DateAwareEntity
{
    /**
     * @var string
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     * @JMS\Groups({"request", "response"})
     */
    private $name;

    /**
     * @var string
     * @JMS\SerializedName("color_background")
     * @JMS\Type("string")
     * @JMS\Groups({"request", "response"})
     */
    private $colorBackground;

    /**
     * @var string
     * @JMS\SerializedName("color")
     * @JMS\Type("string")
     * @JMS\Groups({"request", "response"})
     */
    private $color;

    /**
     * @var int
     * @JMS\SerializedName("invoice")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $invoice = 0;

    /**
     * @var int
     * @JMS\SerializedName("expanse")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $expanse = 0;

    /**
     * @var int
     * @JMS\SerializedName("good")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $good = 0;

    /**
     * @var int
     * @JMS\SerializedName("contractors")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $contractor = 0;

    /**
     * @var int
     * @JMS\SerializedName("document")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $document = 0;

    /**
     * @var int
     * @JMS\SerializedName("payment")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $payment = 0;

    /**
     * @var int
     * @JMS\SerializedName("staff_employee")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $staffEmployee = 0;

    /**
     * @var int
     * @JMS\SerializedName("staff_contract_header")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $staffContractHeader = 0;

    /**
     * @var int
     * @JMS\SerializedName("staff_salary")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $staffSalary = 0;

    /**
     * @var int
     * @JMS\SerializedName("staff_contract_civil_bill")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $staffContractCivilBill = 0;

    /**
     * @var int
     * @JMS\SerializedName("declaration_header")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $declarationHeader = 0;

    /**
     * @var int
     * @JMS\SerializedName("warehouse_document")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $warehouseDocument = 0;

    /**
     * @var int
     * @JMS\SerializedName("payment_cashbox_document")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $paymentCashboxDocument = 0;

    /**
     * @var int
     * @JMS\SerializedName("shop_transaction")
     * @JMS\Type("integer")
     * @JMS\Groups({"request", "response"})
     */
    private $shopTransaction = 0;

    /**
     * @param string $name
     * @param Colour $colour
     * @param bool $invoice
     * @param bool $expanse
     * @param bool $good
     * @param bool $contractor
     * @param bool $document
     * @param bool $payment
     * @param bool $staffEmployee
     * @param bool $staffContractHeader
     * @param bool $staffSalary
     * @param bool $staffContractCivilBill
     * @param bool $declarationHeader
     * @param bool $warehouseDocument
     * @param bool $paymentCashboxDocument
     * @param bool $shopTransaction
     */
    public function __construct(
        $name,
        Colour $colour = null,
        $invoice,
        $expanse,
        $good,
        $contractor,
        $document,
        $payment,
        $staffEmployee,
        $staffContractHeader,
        $staffSalary,
        $staffContractCivilBill,
        $declarationHeader,
        $warehouseDocument,
        $paymentCashboxDocument,
        $shopTransaction
    ) {
        $this->name = $name;
        $this->changeColour($colour);
        $this->invoice = (int)$invoice;
        $this->expanse = (int)$expanse;
        $this->good = (int)$good;
        $this->contractor = (int)$contractor;
        $this->document = (int)$document;
        $this->payment = (int)$payment;
        $this->staffEmployee = (int)$staffEmployee;
        $this->staffContractHeader = (int)$staffContractHeader;
        $this->staffSalary = (int)$staffSalary;
        $this->staffContractCivilBill = (int)$staffContractCivilBill;
        $this->declarationHeader = (int)$declarationHeader;
        $this->warehouseDocument = (int)$warehouseDocument;
        $this->paymentCashboxDocument = (int)$paymentCashboxDocument;
        $this->shopTransaction = (int)$shopTransaction;
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|TagId
     */
    public function id()
    {
        return TagId::create($this->plainId());
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function rename($name)
    {
        $this->name = $name;
    }

    /**
     * @return Colour
     */
    public function colour()
    {
        return new Colour($this->color, $this->colorBackground);
    }

    /**
     * @param Colour|null $colour
     */
    public function changeColour(Colour $colour = null)
    {
        if ($colour) {
            $this->color = $colour->text();
            $this->colorBackground = $colour->background();
            return;
        }

        $this->color = null;
        $this->colorBackground = null;
    }

    /**
     * @return bool
     */
    public function enabledInInvoices()
    {
        return (bool)$this->invoice;
    }

    /**
     * @return bool
     */
    public function enabledInExpanses()
    {
        return (bool)$this->expanse;
    }

    /**
     * @return bool
     */
    public function enabledInGoods()
    {
        return (bool)$this->good;
    }

    /**
     * @return bool
     */
    public function enabledInContractors()
    {
        return (bool)$this->contractor;
    }

    /**
     * @return bool
     */
    public function enabledInDocuments()
    {
        return (bool)$this->document;
    }

    /**
     * @return bool
     */
    public function enabledInPayments()
    {
        return (bool)$this->payment;
    }

    /**
     * @return bool
     */
    public function enabledInStaffEmployees()
    {
        return (bool)$this->staffEmployee;
    }

    /**
     * @return bool
     */
    public function enabledInStaffContractHeaders()
    {
        return (bool)$this->staffContractHeader;
    }

    /**
     * @return bool
     */
    public function enabledInStaffSalaries()
    {
        return (bool)$this->staffSalary;
    }

    /**
     * @return bool
     */
    public function enabledInStaffContractCivilBills()
    {
        return (bool)$this->staffContractCivilBill;
    }

    /**
     * @return bool
     */
    public function enabledInDeclarationHeaders()
    {
        return (bool)$this->declarationHeader;
    }

    /**
     * @return bool
     */
    public function enabledInWarehouseDocuments()
    {
        return (bool)$this->warehouseDocument;
    }

    /**
     * @return bool
     */
    public function enabledInPaymentCashboxDocuments()
    {
        return (bool)$this->paymentCashboxDocument;
    }

    /**
     * @return bool
     */
    public function enabledInShopTransactions()
    {
        return (bool)$this->shopTransaction;
    }

    public function enableInInvoice()
    {
        return $this->invoice = 1;
    }

    public function enableInExpanse()
    {
        return $this->expanse = 1;
    }

    public function enableInGood()
    {
        return $this->good = 1;
    }

    public function enableInContractor()
    {
        return $this->contractor = 1;
    }

    public function enableInDocument()
    {
        return $this->document = 1;
    }

    public function enableInPayment()
    {
        return $this->payment = 1;
    }

    public function enableInStaffEmployee()
    {
        return $this->staffEmployee = 1;
    }

    public function enableInStaffContractHeader()
    {
        return $this->staffContractHeader = 1;
    }

    public function enableInStaffSalary()
    {
        return $this->staffSalary = 1;
    }

    public function enableInStaffContractCivilBill()
    {
        return $this->staffContractCivilBill = 1;
    }

    public function enableInDeclarationHeader()
    {
        return $this->declarationHeader = 1;
    }

    public function enableInWarehouseDocument()
    {
        return $this->warehouseDocument = 1;
    }

    public function enableInPaymentCashboxDocument()
    {
        return $this->paymentCashboxDocument  = 1;
    }

    public function enableInShopTransaction()
    {
        return $this->shopTransaction = 1;
    }

    public function disableInInvoice()
    {
        return $this->invoice = 0;
    }

    public function disableInExpanse()
    {
        return $this->expanse = 0;
    }

    public function disableInGood()
    {
        return $this->good = 0;
    }

    public function disableInContractor()
    {
        return $this->contractor = 0;
    }

    public function disableInDocument()
    {
        return $this->document = 0;
    }

    public function disableInPayment()
    {
        return $this->payment = 0;
    }

    public function disableInStaffEmployee()
    {
        return $this->staffEmployee = 0;
    }

    public function disableInStaffContractHeader()
    {
        return $this->staffContractHeader = 0;
    }

    public function disableInStaffSalary()
    {
        return $this->staffSalary = 0;
    }

    public function disableInStaffContractCivilBill()
    {
        return $this->staffContractCivilBill = 0;
    }

    public function disableInDeclarationHeader()
    {
        return $this->declarationHeader = 0;
    }

    public function disableInWarehouseDocument()
    {
        return $this->warehouseDocument = 0;
    }

    public function disableInPaymentCashboxDocument()
    {
        return $this->paymentCashboxDocument = 0;
    }

    public function disableInShopTransaction()
    {
        return $this->shopTransaction = 1;
    }
}
