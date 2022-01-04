<?php

namespace Webit\WFirmaSDK\Vat\Repository;

use Webit\WFirmaSDK\Entity\Parameters\Conditions;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Vat\VatCode;
use Webit\WFirmaSDK\Vat\VatCodesApi;

final class VatCodeIdApiMapProvider implements VatCodeIdMapProvider
{
    /** @var VatCodesApi */
    private $vatCodesApi;

    /**
     * @param VatCodesApi $vatCodesApi
     */
    public function __construct(VatCodesApi $vatCodesApi)
    {
        $this->vatCodesApi = $vatCodesApi;
    }

    public function getMap(): array
    {
        $map = [];
        /** @var VatCode $vatCode */
        foreach ($this->vatCodesApi->findAll(Parameters::findParameters(Conditions::isNotNull('code'))) as $vatCode) {
            $map[strtoupper($vatCode->code())] = $vatCode->id()->id();
        }

        return $map;
    }
}
