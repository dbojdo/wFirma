<?php

namespace Webit\WFirmaSDK\Goods;

use Webit\WFirmaSDK\Entity\AbstractEnum;

final class WarehouseType extends AbstractEnum
{
    public static function simple(): WarehouseType
    {
        return new self('simple');
    }

    public static function extended(): WarehouseType
    {
        return new self('extended');
    }
}