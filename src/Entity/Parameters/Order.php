<?php

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Context;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;

final class Order
{
    /**
     * @var OrderByField[]
     */
    private $orders = array();

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

    /**
     * @JMS\HandlerCallback("xml", direction="serialization")
     * @param XmlSerializationVisitor $visitor
     * @param $type
     * @param Context $context
     */
    public function serializeToXml(XmlSerializationVisitor $visitor, $type, Context $context)
    {
        foreach ($this->orders as $order) {
            $context->accept($order, array('name' => 'Webit\WFirmaSDK\Entity\Parameters\OrderByField'));
        }
    }

    /**
     * @JMS\HandlerCallback("xml", direction="deserialization")
     * @param XmlDeserializationVisitor $visitor
     * @param $data
     * @param Context $context
     */
    public function deserializeFromXml(XmlDeserializationVisitor $visitor, $data, Context $context)
    {
        foreach ($data as $order) {
            $this->orders[] = $context->accept(
                $order,
                array('name' => 'Webit\WFirmaSDK\Entity\Parameters\OrderByField')
            );
        }
    }
}
