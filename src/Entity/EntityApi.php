<?php

namespace Webit\WFirmaSDK\Entity;

use Webit\WFirmaSDK\Entity\Entity;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

interface EntityApi
{
    /**
     * @param Entity $entity
     * @return Entity
     */
    public function add(Entity $entity);

    /**
     * @param Entity $entity
     * @return Entity
     */
    public function edit(Entity $entity);

    /**
     * @param int $id
     * @param Module $module
     */
    public function delete($id, Module $module);

    /**
     * @param int $id
     * @param Module $module
     * @return Entity
     */
    public function get($id, Module $module);

    /**
     * @param Module $module
     * @param Parameters|null $parameters
     * @return Entity[]
     */
    public function find(
        Module $module,
        Parameters $parameters = null
    );

    /**
     * @param Module $module
     * @param Parameters|null $parameters
     * @return Entity[]|EntityIterator
     */
    public function findAll(Module $module, Parameters $parameters = null);

    /**
     * @param Module $module
     * @param Parameters|null $parameters
     * @return int
     */
    public function count(Module $module, Parameters $parameters = null);

    /**
     * @param Module $module
     * @param string $action
     * @param int|null $id
     * @param Parameters|null $parameters
     * @return Response
     */
    public function executeAction(Module $module, $action, $id = null, Parameters $parameters = null);
}
