<?php

namespace Webit\WFirmaSDK\Expenses;

use Webit\WFirmaSDK\Entity\DateAwareEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("expense_part_vat_content")
 */
final class ExpensePartVatContent extends DateAwareEntity
{

    // TODO - other in xml
    private $netto;
    private $tax;
    private $brutto;
    private $vatregister_netto;
    private $vatregister_tax;
    private $vat_code;

    public function __construct()
    {
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|ExpensePartVatContentId
     */
    public function id()
    {
        return ExpensePartVatContentId::create($this->plainId());
    }
}
