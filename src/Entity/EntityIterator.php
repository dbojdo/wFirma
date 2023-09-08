<?php

namespace Webit\WFirmaSDK\Entity;

use Webit\WFirmaSDK\Entity\Parameters\Pagination;

final class EntityIterator implements \Iterator
{
    /** @var EntityApi */
    private $entityApi;

    /** @var Request */
    private $request;

    /** @var Entity[] */
    private $currentBatch;

    /** @var int */
    private $batchIndex = 0;

    /** @var int */
    private $totalIndex = 0;

    /** @var int */
    private $totalCount;

    public function __construct(EntityApi $entityApi, Request $request)
    {
        $this->entityApi = $entityApi;

        $this->setRequest($request);
    }

    /**
     * @inheritdoc
     */
    public function current(): mixed
    {
        if (!isset($this->currentBatch[$this->batchIndex])) {
            $this->loadNextBatch(true);
        }

        return isset($this->currentBatch[$this->batchIndex]) ? $this->currentBatch[$this->batchIndex] : null;
    }

    /**
     * @inheritdoc
     */
    public function next(): void
    {
        $this->batchIndex++;
        $this->totalIndex++;
    }

    /**
     * @inheritdoc
     */
    public function key(): mixed
    {
        return $this->totalIndex;
    }

    /**
     * @inheritdoc
     */
    public function valid(): bool
    {
        if ($this->totalCount === null) {
            $this->totalCount = $this->entityApi->count($this->request->module(), $this->request->parameters());
        }

        return $this->totalIndex < $this->totalCount;
    }

    /**
     * @inheritdoc
     */
    public function rewind(): void
    {
        $this->currentBatch = null;
        $this->batchIndex = 0;
        $this->totalIndex = 0;
        $this->totalCount = null;
    }

    private function loadNextBatch($force = false)
    {
        if ($this->currentBatch !== null && !$force) {
            return;
        }

        if ($this->currentBatch) {
            $parameters = $this->request->parameters();
            $this->request = $this->request->withParameters(
                $parameters->withPagination($parameters->pagination()->nextPage())
            );
        }

        $this->currentBatch = $this->entityApi->find(
            $this->request->module(),
            $this->request->parameters()
        );
        $this->batchIndex = 0;
    }

    private function setRequest(Request $request)
    {
        $parameters = $request->parameters();
        $limit = $parameters->pagination() ? $parameters->pagination()->limit() : 20;
        $limit = $limit < 1 ? 20 : $limit;
        $parameters = $parameters->withPagination(
            new Pagination($limit, 1)
        );

        $this->request = $request->withParameters($parameters);
    }
}
