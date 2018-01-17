<?php

namespace Webit\WFirmaSDK\Entity;

interface Entity
{
    /**
     * @return EntityId
     */
    public function id();

    /**
     * @return Error[]
     */
    public function errors();
}