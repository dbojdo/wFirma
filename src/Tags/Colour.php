<?php

namespace Webit\WFirmaSDK\Tags;

final class Colour
{
    /** @var string */
    private $text;

    /** @var string */
    private $background;

    /**
     * @param string $text
     * @param string $background
     */
    public function __construct($text = null, $background = null)
    {
        $this->text = $text;
        $this->background = $background;
    }

    /**
     * @return string
     */
    public function text()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function background()
    {
        return $this->background;
    }
}
