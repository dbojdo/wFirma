<?php

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\Condition;

/**
 * @JMS\XmlRoot("parameters")
 */
final class Parameters
{
    /**
     * @var Condition
     * @JMS\Exclude
     * @JMS\Groups({"findRequest"})
     */
    private $condition;

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
        Condition $condition = null,
        Fields $fields = null,
        Order $order = null,
        Pagination $pagination = null,
        array $parameters = array()
    ) {
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
     * @param Condition|null $condition
     * @param Order|null $order
     * @param Pagination|null $pagination
     * @param Fields|null $fields
     * @return Parameters
     */
    public static function findParameters(
        Condition $condition = null,
        Order $order = null,
        Pagination $pagination = null,
        Fields $fields = null
    ) {
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
    public static function actionParameters(array $parameters)
    {
        return new self(null, null, null, null, $parameters);
    }

    /**
     * @return Condition
     */
    public function condition()
    {
        return $this->condition;
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
            $this->condition,
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
        return !($this->condition || $this->fields || $this->order || $this->limit || $this->page || $this->parameters);
    }
}
