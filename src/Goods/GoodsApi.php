<?php

namespace Webit\WFirmaSDK\Goods;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

class GoodsApi
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
     * @param Good $good
     * @return \Webit\WFirmaSDK\Entity\Entity|Good
     */
    public function add(Good $good)
    {
        return $this->entityApi->add($good);
    }

    /**
     * @param Good $good
     * @return \Webit\WFirmaSDK\Entity\Entity|Good
     */
    public function edit(Good $good)
    {
        return $this->entityApi->edit($good);
    }

    /**
     * @param GoodId $id
     */
    public function delete(GoodId $id)
    {
        $this->entityApi->delete($id->id(), Module::goods());
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|Good[]
     */
    public function find(Parameters $parameters = null)
    {
        return $this->entityApi->find(Module::goods(), $parameters);
    }

    /**
     * @param GoodId $id
     * @return \Webit\WFirmaSDK\Entity\Entity|Good
     */
    public function get(GoodId $id)
    {
        return $this->entityApi->get($id->id(), Module::goods());
    }
}