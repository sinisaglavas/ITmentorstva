<?php

namespace App\Repositories;

use App\Models\OrderItem;

class OrderItemRepository
{
    // DI Dependency Injection
    // Imamo stalni pristup OrderItem model-u

    private $orderItemModel;

    public function __construct()
    {
        $this->orderItemModel = new OrderItem();
    }
    // Od sada je OrderItem model stalno ucitan kada god pozovemo OrderItemRepository

    public function createNew($order, $product, $item)
    {
        $this->orderItemModel->create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'amount' => $item['amount'],
            'price' => $product->price * $item['amount'],
        ]);
    }

}
