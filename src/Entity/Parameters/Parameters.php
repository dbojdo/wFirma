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
    private $parameters = [];

    private function __construct(
        Conditions $conditions = null,
        Fields $fields = null,
        Order $order = null,
        Pagination $pagination = null,
        array $parameters = []
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

    public static function defaultParameters(): Parameters
    {
        return new self();
    }

    /**
     * @param Conditions|null $condition
     * @param Order|null $order
     * @param Pagination|null $pagination
     * @param Fields|null $fields
     * @return Parameters
     */
    public static function findParameters(
        Conditions $condition = null,
        Order $order = null,
        Pagination $pagination = null,
        Fields $fields = null
    ): Parameters {
        return new self(
            $condition,
            $fields,
            $order,
            $pagination
        );
    }

    /**
     * @param Parameter[] $parameters
     * @return Parameters
     */
    public static function actionParameters(array $parameters): Parameters
    {
        return new self(null, null, null, null, $parameters);
    }

    /**
     * @deprecated Use `conditions()` instead
     * @return Conditions
     */
    public function condition(): ?Conditions
    {
        return $this->conditions();
    }

    /**
     * @return Conditions
     */
    public function conditions(): ?Conditions
    {
        return $this->conditions;
    }

    /**
     * @return Fields
     */
    public function fields(): ?Fields
    {
        return $this->fields;
    }

    /**
     * @return Order
     */
    public function order(): ?Order
    {
        return $this->order;
    }

    /**
     * @return Pagination
     */
    public function pagination(): Pagination
    {
        return new Pagination($this->limit, $this->page, $this->total);
    }

    /**
     * @return Parameter[]
     */
    public function parameters(): array
    {
        return $this->parameters ?: [];
    }

    /**
     * @param Pagination $pagination
     * @return Parameters
     */
    public function withPagination(Pagination $pagination): Parameters
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
