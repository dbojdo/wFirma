<?php

namespace Webit\WFirmaSDK\Series;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Module;
use Webit\WFirmaSDK\Entity\Entity;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;

class SeriesApi
{
    /** @var EntityApi */
    private $entityApi;

    /**
     * @param EntityApi $entityApi
     */
    public function __construct(EntityApi $entityApi)
    {
        $this->entityApi = $entityApi;
    }

    /**
     * @param Series $series
     * @return Series|Entity
     */
    public function add(Series $series)
    {
        return $this->entityApi->add($series);
    }

    /**
     * @param Series $series
     * @return Series|Entity
     */
    public function edit(Series $series)
    {
        return $this->entityApi->edit($series);
    }

    /**
     * @param SeriesId $id
     * @return \Webit\WFirmaSDK\Entity\Response
     */
    public function delete(SeriesId $id)
    {
        return $this->entityApi->delete($id->id(), Module::series());
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|Series[]
     */
    public function find(Parameters $parameters = null)
    {
        return $this->entityApi->find(Module::series(), $parameters);
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|Series[]
     */
    public function findAll(Parameters $parameters = null)
    {
        return $this->entityApi->findAll(Module::series(), $parameters);
    }

    /**
     * @param SeriesId $id
     * @return \Webit\WFirmaSDK\Entity\Entity|Series
     */
    public function get(SeriesId $id)
    {
        return $this->entityApi->get($id->id(), Module::series());
    }

    /**
     * @param Parameters|null $parameters
     * @return int
     */
    public function count(Parameters $parameters = null)
    {
        return $this->entityApi->count(Module::series(), $parameters);
    }
}