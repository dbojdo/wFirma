<?php

namespace Webit\WFirmaSDK\Expenses;

use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("expense_part_content")
 */
final class ExpensePartContent extends DateAwareEntity
{

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Groups({"response"})
     */
    private $name;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("count")
     * @JMS\Groups({"response"})
     */
    private $count;

    // Other in xml
    private $classification;
    private $expiration;
    private $unit_count;
    private $price;
    private $netto;
    private $brutto;
    private $good;
    private $vat_code;
    private $unit;

    public function __construct()
    {
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|ExpensePartContentId
     */
    public function id()
    {
        return ExpensePartContentId::create($this->plainId());
    }

    /**
     * 
     * @return string 
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * 
     * @return int 
     */
    public function count()
    {
        return $this->count;
    }
}
