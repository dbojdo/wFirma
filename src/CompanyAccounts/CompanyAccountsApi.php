<?php

namespace Webit\WFirmaSDK\CompanyAccounts;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

class CompanyAccountsApi
{
    /** @var EntityApi */
    private $entityApi;

    public function __construct(EntityApi $entityApi)
    {
        $this->entityApi = $entityApi;
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|CompanyAccount[]
     */
    public function find(Parameters $parameters = null)
    {
        return $this->entityApi->find(Module::companyAccounts(), $parameters);
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|\Webit\WFirmaSDK\Entity\EntityIterator|CompanyAccount[]
     */
    public function findAll(Parameters $parameters = null)
    {
        return $this->entityApi->findAll(Module::companyAccounts(), $parameters);
    }

    /**
     * @param CompanyAccountId $id
     * @return \Webit\WFirmaSDK\Entity\Entity|CompanyAccount
     */
    public function get(CompanyAccountId $id)
    {
        return $this->entityApi->get($id->id(), Module::companyAccounts());
    }

    /**
     * @param Parameters|null $parameters
     * @return int
     */
    public function count(Parameters $parameters = null)
    {
        return $this->entityApi->count(Module::companyAccounts(), $parameters);
    }
}