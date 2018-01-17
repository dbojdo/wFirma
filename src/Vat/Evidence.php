<?php

namespace Webit\WFirmaSDK\Vat;

final class Evidence
{
    /** @var string */
    private $type;

    /** @var string */
    private $description;

    /**
     * @param string $type
     * @param string $description
     */
    public function __construct($type, $description = null)
    {
        $this->type = $type;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->description;
    }
}
