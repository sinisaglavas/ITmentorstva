<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    // DI Dependency Injection
    // Imamo stalni pristup Order model-u

    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new Order();
    }
    // Od sada je Order model stalno ucitan kada god pozovemo OrderRepository
    public function createNew($item)
    {
        return $this->orderModel->create([
            'price' => $item,
            'user_id' => Auth::id(),
        ]);
    }


}
