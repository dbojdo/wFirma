<?php

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("parameters")
 */
final class Parameters
{
    /**
     * @var Conditions
     * @JMS\SerializedName("conditions")
     * @JMS\Type("Webit\WFirmaSDK\Entity\Parameters\Conditions")
     * @JMS\Groups({"findRequest"})
     */
    private $conditions;

    /**
     * @var Fields
     * @JMS\SerializedName("fields")
     * @JMS\Type("Webit\WFirmaSDK\Entity\Parameters\Fields")
     * @JMS\Groups({"findRequest"})
     */
    private $fields;

    /**
     * @var Order
     * @JMS\SerializedName("order")
     * @JMS\Type("Webit\WFirmaSDK\Entity\Parameters\Order")
     * @JMS\Groups({"findRequest"})
     */
    private $order;

    /**
     * @var int
     * @JMS\SerializedName("limit")
     * @JMS\Type("integer")
     * @JMS\Groups({"findRequest", "response"})
     */
    private $limit;

    /**
     * @var int
     * @JMS\SerializedName("page")
     * @JMS\Type("integer")
     * @JMS\Groups({"findRequest", "response"})
     */
    private $page;

    /**
     * @var int
     * @JMS\SerializedName("total")
     * @JMS\Type("integer")
     * @JMS\Groups({"response"})
     */
    private $total;

    /**
     * @var Parameter[]
     * @JMS\XmlList(entry="parameter", inline=true)
     * @JMS\Type("array<Webit\WFirmaSDK\Entity\Parameters\Parameter>")
     * @JMS\Groups({"request"})
     */
    private $parameters = array();

    private function __construct(
        Conditions $conditions = null,
        Fields $fields = null,
        Order $order = null,
        Pagination $pagination = null,
        array $parameters = array()
    ) {
        $this->conditions = $conditions ? $conditions->ensureContainer() : null;
        $this->fields = $fields;
        $this->order = $order;
        if ($pagination) {
            $this->limit = $pagination->limit();
            $this->page = $pagination->page();
            $this->total = $pagination->total();
        }
        $this->parameters = $parameters;
    }

    public static function defaultParameters()
    {
        return new self();
    }

    /**
     * @param Conditions|null $conditions
     * @param Order|null $order
     * @param Pagination|null $pagination
     * @param Fields|null $fields
     * @return Parameters
     */
    public static function findParameters(
        Conditions $conditions = null,
        Order $order = null,
        Pagination $pagination = null,
        Fields $fields = null
    ) {
        return new self(
            $conditions,
            $fields,
            $order,
            $pagination
        );
    }

    /**
     * @param Parameter[] $parameters
     * @return Parameters
     */
    public static function actionParameters(array $parameters)
    {
        return new self(null, null, null, null, $parameters);
    }

    /**
     * @deprecated Use `conditions()` instead
     * @return Conditions
     */
    public function condition()
    {
        return $this->conditions();
    }

    /**
     * @return Conditions
     */
    public function conditions()
    {
        return $this->conditions;
    }

    /**
     * @return Fields
     */
    public function fields()
    {
        return $this->fields;
    }

    /**
     * @return Order
     */
    public function order()
    {
        return $this->order;
    }

    /**
     * @return Pagination
     */
    public function pagination()
    {
        return new Pagination($this->limit, $this->page, $this->total);
    }

    /**
     * @return Parameter[]
     */
    public function parameters()
    {
        return $this->parameters ?: array();
    }

    /**
     * @param Pagination $pagination
     * @return Parameters
     */
    public function withPagination(Pagination $pagination)
    {
        return new self(
            $this->conditions,
            $this->fields,
            $this->order,
            $pagination,
            $this->parameters
        );
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return !($this->conditions || $this->fields || $this->order || $this->limit || $this->page || $this->parameters);
    }
}
