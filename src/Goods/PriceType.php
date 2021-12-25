<?php

namespace Webit\WFirmaSDK\Goods;

use Webit\WFirmaSDK\Entity\AbstractEnum;

final class PriceType extends AbstractEnum
{
    public static function netto(): PriceType
    {
        return new self('netto');
    }

    public static function brutto(): PriceType
    {
        return new self('brutto');
    }
}