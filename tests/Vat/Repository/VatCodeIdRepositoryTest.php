<?php

namespace Webit\WFirmaSDK\Vat\Repository;

use PHPUnit\Framework\TestCase;
use Webit\WFirmaSDK\Vat\VatCodeId;
use Webit\WFirmaSDK\Vat\VatRate;

class VatCodeIdRepositoryTest extends TestCase
{
    private const CODE_MAP = [
        '23' => 222,
        'ZW' => 235
    ];

    /** @var VatCodeIdRepository */
    private $repository;

    protected function setUp()
    {
        $this->repository = new VatCodeIdRepository(self::CODE_MAP);
    }

    /**
     * @param string $code
     * @param VatCodeId|null $expectedVatCodeId
     * @dataProvider codes
     * @test
     */
    public function itGetsVatCodeIdByItsStringCode(string $code, ?VatCodeId $expectedVatCodeId)
    {
        $this->assertEquals($expectedVatCodeId, $this->repository->getByCode($code));
    }

    /**
     * @param VatRate $vatRate
     * @param VatCodeId|null $expectedVatCodeId
     * @dataProvider vatRates
     * @test
     */
    public function itGetsVatCodeIdByVatRate(VatRate $vatRate, ?VatCodeId $expectedVatCodeId)
    {
        $this->assertEquals($expectedVatCodeId, $this->repository->getByVatRate($vatRate));
    }

    public function codes()
    {
        return [
            ['23', new VatCodeId(self::CODE_MAP['23'])],
            ['not-mapped', null]
        ];
    }

    /**
     * @test
     */
    public function itGetsAllCodes()
    {
        $this->assertEquals(
            ['23' => new VatCodeId(self::CODE_MAP['23']), 'ZW' => new VatCodeId(self::CODE_MAP['ZW'])],
            $this->repository->getAll()
        );
    }

    public function vatRates()
    {
        return [
            [VatRate::fromCode('23'), new VatCodeId(self::CODE_MAP['23'])],
            [VatRate::fromVatCodeId($id = new VatCodeId(645)), $id]
        ];
    }
}