<?php

namespace Webit\WFirmaSDK\Goods;

final class Dimensions
{
    /** @var float|null */
    private $weight;

    /** @var float|null */
    private $length;

    /** @var float|null */
    private $width;

    /** @var float|null */
    private $height;

    /**
     * @param ?float $weight
     * @param ?float $length
     * @param ?float $width
     * @param ?float $height
     */
    public function __construct(
        float $weight = null,
        float $length = null,
        float $width = null,
        float $height = null
    ) {
        $this->weight = $weight;
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return ?float
     */
    public function weight(): ?float
    {
        return $this->weight;
    }

    /**
     * @return ?float
     */
    public function length(): ?float
    {
        return $this->length;
    }

    /**
     * @return ?float
     */
    public function width(): ?float
    {
        return $this->width;
    }

    /**
     * @return ?float
     */
    public function height(): ?float
    {
        return $this->height;
    }
}