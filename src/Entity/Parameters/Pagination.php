<?php

namespace Webit\WFirmaSDK\Entity\Parameters;

final class Pagination
{
    /** @var int */
    private $limit;

    /** @var int */
    private $page;

    /** @var int */
    private $total;

    /**
     * @param int $limit
     * @param int $page
     * @return Pagination
     */
    public static function create($limit = 20, $page = 1)
    {
        return new self($limit, $page);
    }

    /**
     * @param int $limit
     * @param int $page
     * @param int $total
     */
    public function __construct($limit = 20, $page = 1, $total = null)
    {
        $this->limit = $limit < 0 ? 20 : (int)$limit;
        $this->page = $page < 1 ? 20 : (int)$page;
        $this->total = $total;
    }

    /**
     * @return Pagination
     */
    public function nextPage()
    {
        return new self($this->limit, $this->page + 1);
    }

    /**
     * @return int
     */
    public function limit()
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function page()
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function total()
    {
        return $this->total;
    }
}