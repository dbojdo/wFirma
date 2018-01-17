<?php

namespace Webit\WFirmaSDK\Series;

final class TemplateTokens
{
    /**
     * @param int $leadingZeros
     * @return string
     */
    public static function number($leadingZeros = 0)
    {
        if ($leadingZeros > 0) {
            return sprintf('[numer:zera_wiodące=%d]', $leadingZeros);
        }

        return '[numer]';
    }

    /**
     * @return string
     */
    public static function day()
    {
        return '[dzień]';
    }

    /**
     * @param bool $leadingZero
     * @return string
     */
    public static function month($leadingZero = false)
    {
        if ($leadingZero) {
            return '[miesiąc:zera_wiodące=2]';
        }

        return '[miesiąc]';
    }

    /**
     * @return string
     */
    public static function quarter()
    {
        return '[kwartał]';
    }

    /**
     * @param bool $twoDigits
     * @return string
     */
    public static function year($twoDigits = false)
    {
        if ($twoDigits) {
            return '[rok:format_dwucyfrowy]';
        }

        return '[rok]';
    }

    /**
     * @return string
     */
    public static function dayOfYear()
    {
        return '[dzień_roku]';
    }
}