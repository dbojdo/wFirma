<?php

namespace Webit\WFirmaSDK\Goods;

use Webit\WFirmaSDK\Entity\AbstractEnum;

final class Type extends AbstractEnum
{
    /**
     * @return Type
     */
    public static function good()
    {
        return new self('good');
    }

    /**
     * @return Type
     */
    public static function service()
    {
        return new self('service');
    }
}
