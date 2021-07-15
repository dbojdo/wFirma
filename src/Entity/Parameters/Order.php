<?php

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;

final class Order
{
    /**
     * @var OrderByField[]
     * @JMS\XmlList(inline=true)
     * @JMS\Groups({"findRequest"})
     */
    private $orders = [];

    private function __construct(array $orders = array())
    {
        $this->orders = $orders;
    }

    /**
     * @param string $field
     * @return Order
     */
    public static function ascending($field)
    {
        $order = new self();
        $order->thenAscending($field);

        return $order;
    }

    /**
     * @param string $field
     * @return Order
     */
    public static function descending($field)
    {
        $order = new self();
        $order->thenDescending($field);

        return $order;
    }

    /**
     * @param string $field
     * @return Order
     */
    public function thenAscending($field)
    {
        $this->orders[] = OrderByField::ascending($field);
        return $this;
    }

    /**
     * @param string $field
     * @return Order
     */
    public function thenDescending($field)
    {
        $this->orders[$field] = OrderByField::descending($field);
        return $this;
    }

    /**
     * @return OrderByField[]
     */
    public function orders()
    {
        return $this->orders;
    }

    /**
     * @param OrderByField[] $orders
     * @return Order
     */
    public static function fromOrders(array $orders)
    {
        return new self($orders);
    }
}
