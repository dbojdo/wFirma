<?php

namespace Webit\WFirmaSDK\TaxRegisters;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

class TaxRegistersApi
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
     * Get KPiR entries by year and optional month.
     * @param Parameters $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|TaxRegister[]
     */
    public function get(TaxRegistersId $taxRegistersId)
    {
        return $this->entityApi->executeAction(Module::taxregisters(), 'get', $taxRegistersId->id())->entities();
    }
}
