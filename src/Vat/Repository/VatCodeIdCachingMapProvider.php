<?php

namespace Webit\WFirmaSDK\Vat\Repository;

use Psr\SimpleCache\CacheInterface;

final class VatCodeIdCachingMapProvider implements VatCodeIdMapProvider
{
    private const CACHE_KEY = 'wFirma.vat_code_map';

    /** @var VatCodeIdMapProvider */
    private $provider;

    /** @var CacheInterface */
    private $cache;

    /**
     * @param VatCodeIdMapProvider $provider
     * @param CacheInterface $cache
     */
    public function __construct(VatCodeIdMapProvider $provider, CacheInterface $cache)
    {
        $this->provider = $provider;
        $this->cache = $cache;
    }

    public function getMap(): array
    {
        if (!$this->cache->has(self::CACHE_KEY)) {
            $this->cache->set(self::CACHE_KEY, $this->provider->getMap());
        }

        return $this->cache->get(self::CACHE_KEY);
    }
}
