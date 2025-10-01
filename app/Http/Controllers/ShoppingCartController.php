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
        Session::put('product', [
            $request->id => $request->amount
        ]);
       return redirect()->route('cart.index');
    }
}
