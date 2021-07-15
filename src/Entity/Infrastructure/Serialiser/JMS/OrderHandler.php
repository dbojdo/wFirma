<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\JMS;

use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\XmlSerializationVisitor;
use Webit\WFirmaSDK\Entity\Parameters\Order;

final class OrderHandler implements SubscribingHandlerInterface
{

    public static function getSubscribingMethods()
    {
        return [
           [
               'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
               'format' => 'xml',
               'type' => Order::class,
               'method' => 'serialiseToXml',
           ],
        ];
    }

    public function serialiseToXml(
        XmlSerializationVisitor $visitor,
        Order $order,
        array $type,
        SerializationContext $context
    ) {
        foreach ($order->orders() as $orderByField) {
            $context->getNavigator()->accept($orderByField);
        }
    }
}