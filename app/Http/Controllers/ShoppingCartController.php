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
//        $allProducts = [];
//        foreach (Session::get('product') as $cartItem)
//        {
//            $allProducts[] = $cartItem['product_id']; // izvlacimo samo 'id' proizvoda
//        }
//        $products = Product::whereIn('id', $allProducts)->get(); // whereIn za assoc array

        $allProducts = array_column(Session::get('product'), 'product_id'); // chatGPT
        $products = Product::whereIn('id', $allProducts)->get();

        return view('cart', [
            'cart' => Session::get('product'),
            'products' => $products,
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
