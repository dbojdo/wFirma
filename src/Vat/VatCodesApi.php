<?php

namespace Webit\WFirmaSDK\Vat;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Entity\EntityIterator;
use Webit\WFirmaSDK\Module;
use Webit\WFirmaSDK\Entity\Entity;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;

class VatCodesApi
{
    /** @var EntityApi */
    private $entityApi;

    public function __construct(EntityApi $entityApi)
    {
        $this->entityApi = $entityApi;
    }

    /**
     * @param Parameters|null $parameters
     * @return VatCode[]|Entity[]
     */
    public function find(Parameters $parameters = null)
    {
        return $this->entityApi->find(Module::vatCodes(), $parameters);
    }

    /**
     * @param Parameters|null $parameters
     * @return EntityIterator|Entity[]
     */
    public function findAll(Parameters $parameters = null)
    {
        return $this->entityApi->findAll(Module::vatCodes(), $parameters);
    }

    /**
     * @param VatCodeId $id
     * @return VatCode|Entity
     */
    public function get(VatCodeId $id)
    {
        return $this->entityApi->get($id->id(), Module::vatCodes());
    }

    /**
     * @param Parameters|null $parameters
     * @return int
     */
    public function count(Parameters $parameters = null)
    {
        return $this->entityApi->count(Module::vatCodes(), $parameters);
    }
}
