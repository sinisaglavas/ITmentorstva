<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\Product;
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
        $product = Product::findOrFail($request->get('id'));
        $checkAmount = $product->amount;
        $cartAmount = $request->get('amount');
        if ($checkAmount < $cartAmount)
        {
            return redirect()->back()->with('message', 'The quantity on stock is not sufficient! Max: ' .$checkAmount.' pcs');
        }

        Session::push('product', [
            'product_name' => $product->name,
            'amount' => $request->amount,
        ]);

        return redirect()->route('cart.index');
    }
}
