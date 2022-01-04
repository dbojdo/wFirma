<?php

namespace Webit\WFirmaSDK\Vat\Repository;

use Webit\WFirmaSDK\Vat\VatCodeId;
use Webit\WFirmaSDK\Vat\VatRate;

final class VatCodeIdRepository
{
    /** @var int[] */
    private $codeToIdMap;

    /**
     * @param int[] $codeToIdMap
     */
    public function __construct(array $codeToIdMap)
    {
        $this->codeToIdMap = [];
        foreach ($codeToIdMap as $key => $id) {
            $this->codeToIdMap[strtoupper($key)] = (int)$id;
        }
    }

    /**
     * Gets the VatCodeId by its string code
     *
     * @param string $code
     * @return ?VatCodeId
     */
    public function getByCode(string $code): ?VatCodeId
    {
        $code = strtoupper($code);
        if (isset($this->codeToIdMap[$code])) {
            return new VatCodeId($this->codeToIdMap[$code]);
        }

        return null;
    }

    /**
     * Gets the VatCodeId by the given VatRate
     *
     * @param VatRate $vatRate
     * @return ?VatCodeId
     */
    public function getByVatRate(VatRate $vatRate): ?VatCodeId
    {
        return $vatRate->vatCodeId() ?: $this->getByCode((string)$vatRate->code());
    }

    /**
     * Returns all known VatCodeId mapped by their string code
     *
     * @return VatCodeId[]
     */
    public function getAll(): array
    {
        $codes = [];
        foreach ($this->codeToIdMap as $code => $id) {
            $codes[$code] = new VatCodeId($id);
        }

        return $codes;
    }
}
