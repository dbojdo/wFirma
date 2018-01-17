<?php

namespace Webit\WFirmaSDK\Entity;

final class File
{
    /** @var string */
    private $content;

    /**
     * @param string $content
     */
    public function __construct($content)
    {
        $this->content = (string)$content;
    }

    /**
     * @return string
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->content;
    }
}
