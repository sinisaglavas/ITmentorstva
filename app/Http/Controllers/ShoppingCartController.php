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
        $combined = [];
        if (Session::get('product') == null)
        {
            return redirect()->back();
        }
        foreach (Session::get('product') as $cartItem)
        {
            $product = Product::firstWhere('id', $cartItem['product_id']);
            $combined[] = [
                'product_name' => $product->name,
                'product_description' => $product->description,
                'product_amount' => $cartItem['amount'],
                'product_price' => $product->price,
                'product_image' => $product->image,
                'total_price' => $cartItem['amount'] * $product->price,
            ];
        }

        return view('cart', [
            'cart' => $combined,
        ]);
    }

    public function addToCart(CartAddRequest $request)
    {
        $product = Product::findOrFail($request->get('id'));
        $checkAmount = $product->amount;
        $cartAmount = $request->get('amount');
        if ($product && $checkAmount < $cartAmount) // provera produkta i kolicine produkta
        {
            return redirect()->back()
                ->with('message', 'The quantity on stock is not sufficient! Max: ' .$checkAmount.' pcs');
        }

        Session::push('product', [
            'product_id' => $product->id,
            'amount' => $request->amount,
        ]);

        return redirect()->route('cart.index');
    }
}
