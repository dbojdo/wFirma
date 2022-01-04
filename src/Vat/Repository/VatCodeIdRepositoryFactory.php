<?php

namespace Webit\WFirmaSDK\Vat\Repository;

use Psr\SimpleCache\CacheInterface;
use Webit\WFirmaSDK\Vat\VatCodesApi;

final class VatCodeIdRepositoryFactory
{
    public static function createWithApi(VatCodesApi $api, CacheInterface $cache = null): VatCodeIdRepository
    {
        $provider = new VatCodeIdApiMapProvider($api);
        if ($cache) {
            $provider = new VatCodeIdCachingMapProvider(
                $provider,
                $cache
            );
        }

        return new VatCodeIdRepository($provider->getMap());
    }

    public static function createWithMap(array $map): VatCodeIdRepository
    {
        return new VatCodeIdRepository($map);
    }
}
