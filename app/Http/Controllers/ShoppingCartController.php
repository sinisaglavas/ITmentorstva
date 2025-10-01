<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index()
    {
        return view('cart', [
            'cart' => Session::get('product'),
        ]);
    }

    public function addToCart(CartAddRequest $request)
    {
        Session::push('product', [
            'product_id' => $request->id,
            'amount' => $request->amount,
        ]);
       return redirect()->route('cart.index');
    }
}
