<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = ['iPhone 10', 'Samsung 10+', 'Xiaomi 20+', 'Samsung Note 20+'];
        return view('shop', compact('products'));
    }
}
