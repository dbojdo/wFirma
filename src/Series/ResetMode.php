<?php

namespace Webit\WFirmaSDK\Series;

final class ResetMode
{
    /** @var string */
    private $mode;

    /**
     * @param string $mode
     */
    private function __construct($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return ResetMode
     */
    public static function yearly()
    {
        return new self('yearly');
    }

    /**
     * @return ResetMode
     */
    public static function monthly()
    {
        return new self('monthly');
    }

    /**
     * @return ResetMode
     */
    public static function daily()
    {
        return new self('daily');
    }

    /**
     * @param string $mode
     * @return ResetMode
     * @internal
     */
    public static function fromString($mode)
    {
        return new self($mode);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->mode;
    }
}