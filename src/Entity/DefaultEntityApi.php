<?php

namespace Webit\WFirmaSDK\Entity;

use Webit\WFirmaSDK\Entity\Infrastructure\RequestExecutor;
use Webit\WFirmaSDK\Entity\Parameters\Pagination;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

final class DefaultEntityApi implements EntityApi
{
    /** @var RequestExecutor */
    private $requestExecutor;

    /**
     * @param RequestExecutor $requestExecutor
     */
    public function __construct(RequestExecutor $requestExecutor)
    {
        $this->requestExecutor = $requestExecutor;
    }

    /**
     * @inheritdoc
     */
    public function add(Entity $entity)
    {
        $module = Module::moduleOfEntity($entity);
        $request = Request::addRequest($module, $entity);

        $apiResponse = $this->requestExecutor->execute($request);

        return $apiResponse->entity();
    }

    /**
     * @inheritdoc
     */
    public function edit(Entity $entity)
    {
        $module = Module::moduleOfEntity($entity);
        $request = Request::editRequest($module, $entity);

        $apiResponse = $this->requestExecutor->execute($request);

        return $apiResponse->entity();
    }

    /**
     * @inheritdoc
     */
    public function delete($id, Module $module)
    {
        $request = Request::deleteRequest($module, $id);

        $apiResponse = $this->requestExecutor->execute($request);

        return $apiResponse->entity();
    }

    /**
     * @inheritdoc
     */
    public function get($id, Module $module)
    {
        $request = Request::getRequest($module, $id);

        $apiResponse = $this->requestExecutor->execute($request);

        return $apiResponse->entity();
    }

    /**
     * @inheritdoc
     */
    public function find(Module $module, Parameters $parameters = null)
    {
        $request = Request::findRequest($module, $parameters);

        $apiResponse = $this->requestExecutor->execute($request);

        return $apiResponse->entities();
    }

    /**
     * @inheritdoc
     */
    public function findAll(Module $module, Parameters $parameters = null)
    {
        $request = Request::findRequest($module, $parameters);
        return new EntityIterator(
            $this,
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function count(Module $module, Parameters $parameters = null)
    {
        $parameters = $parameters ?: Parameters::findParameters();
        $parameters = $parameters->withPagination(new Pagination(0, 1));

        $request = Request::countRequest($module, $parameters);

        $apiResponse = $this->requestExecutor->execute($request);

        return $apiResponse->parameters()->pagination()->total();
    }

    /**
     * @inheritdoc
     */
    public function executeAction(Module $module, $action, $id = null, Parameters $parameters = null)
    {
        $request = Request::actionRequest($module, $action, $id, $parameters);

        $apiResponse = $this->requestExecutor->execute($request);

        return $apiResponse;
    }
}
