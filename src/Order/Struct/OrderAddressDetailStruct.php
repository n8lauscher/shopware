<?php declare(strict_types=1);

namespace Shopware\Order\Struct;

use Shopware\Order\Collection\OrderBasicCollection;
use Shopware\Order\Collection\OrderDeliveryBasicCollection;

class OrderAddressDetailStruct extends OrderAddressBasicStruct
{
    /**
     * @var OrderBasicCollection
     */
    protected $orders;

    /**
     * @var OrderDeliveryBasicCollection
     */
    protected $orderDeliveries;

    public function __construct()
    {
        $this->orders = new OrderBasicCollection();

        $this->orderDeliveries = new OrderDeliveryBasicCollection();
    }

    public function getOrders(): OrderBasicCollection
    {
        return $this->orders;
    }

    public function setOrders(OrderBasicCollection $orders): void
    {
        $this->orders = $orders;
    }

    public function getOrderDeliveries(): OrderDeliveryBasicCollection
    {
        return $this->orderDeliveries;
    }

    public function setOrderDeliveries(OrderDeliveryBasicCollection $orderDeliveries): void
    {
        $this->orderDeliveries = $orderDeliveries;
    }
}