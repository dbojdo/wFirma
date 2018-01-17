<?php

namespace Webit\WFirmaSDK\Tags;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

class TagsApi
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
     * @param Tag $tag
     * @return \Webit\WFirmaSDK\Entity\Entity|Tag
     */
    public function add(Tag $tag)
    {
        return $this->entityApi->add($tag);
    }

    /**
     * @param Tag $tag
     * @return \Webit\WFirmaSDK\Entity\Entity|Tag
     */
    public function edit(Tag $tag)
    {
        return $this->entityApi->edit($tag);
    }

    /**
     * @param TagId $id
     */
    public function delete(TagId $id)
    {
        $this->entityApi->delete($id->id(), Module::tags());
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|Tag[]
     */
    public function find(Parameters $parameters = null)
    {
        return $this->entityApi->find(Module::tags(), $parameters);
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|\Webit\WFirmaSDK\Entity\EntityIterator|Tag[]
     */
    public function findAll(Parameters $parameters = null)
    {
        return $this->entityApi->findAll(Module::tags(), $parameters);
    }

    /**
     * @param Parameters|null $parameters
     * @return int
     */
    public function count(Parameters $parameters = null)
    {
        return $this->entityApi->count(Module::tags(), $parameters);
    }
}