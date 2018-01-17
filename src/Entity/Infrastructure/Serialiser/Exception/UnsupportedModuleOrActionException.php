<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\Exception;

class UnsupportedModuleOrActionException extends ApiSerialiserException
{
    /**
     * @param string $module
     * @param string $action
     * @return UnsupportedModuleOrActionException
     */
    public static function create($module, $action)
    {
        return new self(sprintf(
            'Given action "%s" of the "%s" module is not supported by this serialiser.',
            $action,
            $module
        ));
    }
}
