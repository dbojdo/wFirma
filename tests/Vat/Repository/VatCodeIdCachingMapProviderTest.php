<?php

namespace Webit\WFirmaSDK\Vat\Repository;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\SimpleCache\CacheInterface;

class VatCodeIdCachingMapProviderTest extends TestCase
{
    /** @var VatCodeIdMapProvider|ObjectProphecy */
    private $innerProvider;

    /** @var CacheInterface|ObjectProphecy */
    private $cache;

    /** @var VatCodeIdCachingMapProvider */
    private $provider;

    protected function setUp()
    {
        $this->innerProvider = $this->prophesize(VatCodeIdMapProvider::class);
        $this->cache = $this->prophesize(CacheInterface::class);
        $this->provider = new VatCodeIdCachingMapProvider(
            $this->innerProvider->reveal(),
            $this->cache->reveal()
        );
    }

    /**
     * @test
     */
    public function itUsesInnerProviderIfCacheNotPopulated()
    {
        $this->cache->has(Argument::type('string'))->willReturn(false);
        $this->innerProvider->getMap()->willReturn($map = ['A' => 1, 'B' => 2]);
        $this->cache->set(Argument::type('string'), $map)->shouldBeCalled();
        $this->cache->get(Argument::type('string'))->willReturn($map);

        $this->assertEquals($map, $this->provider->getMap());
    }

    /**
     * @test
     */
    public function itUsesCacheIfPopulated()
    {
        $this->cache->has(Argument::type('string'))->willReturn(true);
        $this->cache->get(Argument::type('string'))->willReturn($map = ['A' => 1, 'B' => 2]);
        $this->innerProvider->getMap()->shouldNotBeCalled();
        $this->cache->get(Argument::type('string'))->willReturn($map);

        $this->assertEquals($map, $this->provider->getMap());
    }
}