<?php

namespace Webit\WFirmaSDK\Contractors;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

class ContractorsApi
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
     * @param Contractor $contractor
     * @return \Webit\WFirmaSDK\Entity\Entity|Contractor
     */
    public function add(Contractor $contractor)
    {
        return $this->entityApi->add($contractor);
    }

    /**
     * @param Contractor $contractor
     * @return \Webit\WFirmaSDK\Entity\Entity|Contractor
     */
    public function edit(Contractor $contractor)
    {
        return $this->entityApi->edit($contractor);
    }

    /**
     * @param ContractorId $id
     */
    public function delete(ContractorId $id)
    {
        $this->entityApi->delete($id->id(), Module::contractors());
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|Contractor[]
     */
    public function find(Parameters $parameters = null)
    {
        return $this->entityApi->find(Module::contractors(), $parameters);
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|\Webit\WFirmaSDK\Entity\EntityIterator|Contractor[]
     */
    public function findAll(Parameters $parameters = null)
    {
        return $this->entityApi->findAll(Module::contractors(), $parameters);
    }

    /**
     * @param ContractorId $id
     * @return \Webit\WFirmaSDK\Entity\Entity|Contractor
     */
    public function get(ContractorId $id)
    {
        return $this->entityApi->get($id->id(), Module::contractors());
    }

    /**
     * @param Parameters|null $parameters
     * @return int
     */
    public function count(Parameters $parameters = null)
    {
        return $this->entityApi->count(Module::contractors(), $parameters);
    }
}