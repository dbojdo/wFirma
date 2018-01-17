<?php

namespace Webit\WFirmaSDK\Entity;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\Parameters\Pagination;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

/**
 * @JMS\XmlRoot("api")
 * @internal
 */
final class Request
{
    /**
     * @var Module
     * @JMS\Exclude
     */
    private $module;

    /**
     * @var string
     * @JMS\Exclude
     */
    private $action;

    /**
     * @var int
     * @JMS\Exclude
     */
    private $entityId;

    /**
     * @var EntityWrapper
     * @JMS\Groups({"request", "response"})
     */
    private $entityWrapper;

    /**
     * @param Module $module
     * @param string $action
     * @param null $entityId
     * @param Entity $entity
     * @param Parameters $parameters
     */
    private function __construct(
        Module $module,
        $action,
        $entityId = null,
        Entity $entity = null,
        Parameters $parameters = null
    ) {
        $this->module = $module;
        $this->action = $action;
        $this->entityId = $entityId;
        $this->entityWrapper = new EntityWrapper($entity, $parameters);
    }

    /**
     * @param Module $module
     * @param string $action
     * @param Entity $entity
     * @param Parameters|null $parameters
     * @return Request
     */
    public static function entityRequest(Module $module, $action, Entity $entity, Parameters $parameters = null)
    {
        return new self($module, $action, $entity->id(), $entity, $parameters);
    }

    /**
     * @param Module $module
     * @param Entity $entity
     * @param Parameters|null $parameters
     * @return Request
     */
    public static function addRequest(Module $module, Entity $entity, Parameters $parameters = null)
    {
        return new self($module, 'add', null, $entity, $parameters);
    }

    /**
     * @param Module $module
     * @param Entity $entity
     * @param Parameters|null $parameters
     * @return Request
     */
    public static function editRequest(Module $module, Entity $entity, Parameters $parameters = null)
    {
        return new self($module, 'edit', $entity->id(), $entity, $parameters);
    }

    /**
     * @param Module $module
     * @param int $entityId
     * @return Request
     */
    public static function getRequest(Module $module, $entityId)
    {
        return new self($module, 'get', $entityId);
    }

    /**
     * @param Module $module
     * @param int $entityId
     * @return Request
     */
    public static function deleteRequest(Module $module, $entityId)
    {
        return new self($module, 'delete', $entityId);
    }

    /**
     * @param Module $module
     * @param Parameters $parameters
     * @return Request
     */
    public static function findRequest(Module $module, Parameters $parameters = null)
    {
        return new self($module, 'find', null,null, $parameters);
    }

    /**
     * @param Module $module
     * @param Parameters|null $parameters
     * @return Request
     */
    public static function countRequest(Module $module, Parameters $parameters = null)
    {
        return self::findRequest($module, $parameters->withPagination(new Pagination(0, 1)));
    }

    /**
     * @param Module $module
     * @param $action
     * @param $entityId
     * @param Parameters|null $parameters
     * @return Request
     */
    public static function actionRequest(Module $module, $action, $entityId = null, Parameters $parameters = null)
    {
        return new self($module, $action, $entityId, null, $parameters);
    }

    /**
     * @return Entity
     */
    public function entity()
    {
        return $this->entityWrapper->entity();
    }

    /**
     * @return Module
     */
    public function module()
    {
        return $this->module;
    }

    /**
     * @return Parameters
     */
    public function parameters()
    {
        return $this->entityWrapper->parameters();
    }

    /**
     * @return null|string
     */
    public function action()
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function requestUrl()
    {
        return rtrim(sprintf('/%s/%s/%s', (string)$this->module, $this->action, $this->entityId), '/');
    }

    /**
     * @param Parameters $parameters
     * @return Request
     */
    public function withParameters(Parameters $parameters)
    {
        return new self($this->module, $this->action, $this->entityId, $this->entityWrapper->entity(), $parameters);
    }

    /**
     * @return bool
     */
    public function isBodyEmpty()
    {
        return $this->entityWrapper->parameters()->isEmpty() && !$this->entityWrapper->entities();
    }
}
