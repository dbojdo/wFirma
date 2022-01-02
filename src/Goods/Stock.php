<?php

namespace Webit\WFirmaSDK\Goods;

/**
 * Represents stock properties of the Good
 */
final class Stock
{
    /** @var ?float */
    private $count;

    /** @var ?float */
    private $min;

    /** @var ?float */
    private $max;

    /** @var ?float */
    private $secure;

    /** @var ?float */
    private $reserved;

    /**
     * @param float|null $count
     * @param float|null $min
     * @param float|null $max
     * @param float|null $secure
     * @param float|null $reserved
     */
    public function __construct(
        ?float $count = null,
        ?float $min = null,
        ?float $max = null,
        ?float $secure = null,
        ?float $reserved = null
    ) {
        $this->count = $count;
        $this->min = $min;
        $this->max = $max;
        $this->secure = $secure;
        $this->reserved = $reserved;
    }

    /**
     * @return float|null
     */
    public function count(): ?float
    {
        return $this->count;
    }

    /**
     * @return float|null
     */
    public function min(): ?float
    {
        return $this->min;
    }

    /**
     * @return float|null
     */
    public function max(): ?float
    {
        return $this->max;
    }

    /**
     * @return float|null
     */
    public function secure(): ?float
    {
        return $this->secure;
    }

    /**
     * @return float|null
     */
    public function reserved(): ?float
    {
        return $this->reserved;
    }

    /**
     * @param float|null $count
     * @return Stock
     */
    public function setCount(?float $count): Stock
    {
        return new self($count, $this->min, $this->max, $this->secure, $this->reserved);
    }

    /**
     * @param float|null $min
     * @return Stock
     */
    public function setMin(?float $min): Stock
    {
        return new self($this->count, $min, $this->max, $this->secure, $this->reserved);
    }

    /**
     * @param float|null $max
     * @return Stock
     */
    public function setMax(?float $max): Stock
    {
        return new self($this->count, $this->min, $max, $this->secure, $this->reserved);
    }

    /**
     * @param float|null $secure
     * @return Stock
     */
    public function withSecure(?float $secure): Stock
    {
        return new self($this->count, $this->min, $this->max, $secure, $this->reserved);
    }
}