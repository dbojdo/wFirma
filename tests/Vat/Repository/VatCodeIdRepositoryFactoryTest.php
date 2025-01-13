<?php

namespace Webit\WFirmaSDK\Vat\Repository;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\SimpleCache\CacheInterface;
use Webit\WFirmaSDK\Vat\VatCodeId;
use Webit\WFirmaSDK\Vat\VatCodesApi;
use Prophecy\PhpUnit\ProphecyTrait;

class VatCodeIdRepositoryFactoryTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @test
     */
    public function itCreatesRepositoryWithStaticMap()
    {
        $map = [
            '23' => 222
        ];

        $this->assertInstanceOf(VatCodeIdRepository::class, $repo = VatCodeIdRepositoryFactory::createWithMap($map));
        $this->assertEquals(new VatCodeId(222), $repo->getByCode('23'));
    }

    /**
     * @test
     */
    public function itCreatesRepositoryWithApi()
    {
        /** @var VatCodesApi|ObjectProphecy $api */
        $api = $this->prophesize(VatCodesApi::class);
        $api->findAll(Argument::any())->willReturn([]);

        $this->assertInstanceOf(
            VatCodeIdRepository::class,
            $repo = VatCodeIdRepositoryFactory::createWithApi($api->reveal())
        );
        $this->assertNull($repo->getByCode('23'));
    }

    /**
     * @test
     */
    public function itCreatesRepositoryWithApiAndCache()
    {
        /** @var VatCodesApi|ObjectProphecy $api */
        $api = $this->prophesize(VatCodesApi::class);

        $cache = $this->prophesize(CacheInterface::class);
        $cache->has(Argument::type('string'))->willReturn(true);
        $cache->get(Argument::type('string'))->willReturn(['23' => 222]);

        $this->assertInstanceOf(
            VatCodeIdRepository::class,
            $repo = VatCodeIdRepositoryFactory::createWithApi($api->reveal(), $cache->reveal())
        );

        $this->assertEquals(new VatCodeId(222), $repo->getByCode('23'));
    }
}