<?php

namespace Webit\WFirmaSDK\Expenses;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

class ExpensesApi
{
    /** @var EntityApi */
    private $entityApi;

    /**
     * @param EntityApi $entityApi
     */
    public function __construct(EntityApi $entityApi)
    {
        $this->entityApi = $entityApi;
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|Expense[]
     */
    public function find(Parameters $parameters = null)
    {
        return $this->entityApi->find(Module::expenses(), $parameters);
    }

    /**
     * @param ExpenseId $id
     * @return \Webit\WFirmaSDK\Entity\Entity|Expense
     */
    public function get(ExpenseId $id)
    {
        return $this->entityApi->get($id->id(), Module::expenses());
    }
}