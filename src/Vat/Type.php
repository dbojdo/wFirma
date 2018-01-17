<?php

namespace Webit\WFirmaSDK\Vat;

use Webit\WFirmaSDK\Entity\AbstractEnum;

final class Type extends AbstractEnum
{
    /**
     * @return Type
     */
    public static function reduced()
    {
        return new self('reduced');
    }

    /**
     * @return Type
     */
    public static function standard()
    {
        return new self('standard');
    }

    /**
     * @return Type
     */
    public static function other()
    {
        return new self('other');
    }
}
