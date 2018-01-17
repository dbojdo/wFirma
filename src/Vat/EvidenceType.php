<?php

namespace Webit\WFirmaSDK\Vat;

use Webit\WFirmaSDK\Entity\AbstractEnum;

final class EvidenceType extends AbstractEnum
{
    /**
     * @return EvidenceType
     */
    public static function a()
    {
        return new self('A');
    }

    /**
     * @return EvidenceType
     */
    public static function b()
    {
        return new self('B');
    }

    /**
     * @return EvidenceType
     */
    public static function c()
    {
        return new self('C');
    }

    /**
     * @return EvidenceType
     */
    public static function d()
    {
        return new self('D');
    }

    /**
     * @return EvidenceType
     */
    public static function e()
    {
        return new self('E');
    }

    /**
     * @return EvidenceType
     */
    public static function f()
    {
        return new self('F');
    }
}
