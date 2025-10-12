<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\Product;
use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    private $orderRepo;
    private $orderItemRepo;
    private $productRepo;
    public function __construct()
    {
        $this->orderRepo = new OrderRepository();
        $this->orderItemRepo = new OrderItemRepository();
        $this->productRepo = new ProductRepository();
    }

    public function index()
    {
        $cart = Session::get('product');
        if ($cart == null)
        {
            return redirect('/'); // ako nema nista u korpi vrati ga na pocetnu
        }
        $combined = [];
        foreach ($cart as $cartItem)
        {
            $product = $this->productRepo->getProductById($cartItem['product_id']);
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

    public function finishOrder()
    {
        $cart = Session::get('product');
        $totalCartPrice = 0;
        foreach ($cart as $item)
        {
            $product = $this->productRepo->getProductById($item['product_id']);

            if ($product->amount < $item['amount'])
            {
                return redirect()->back()->with('message', 'The quantity on stock is not sufficient! Max: ' .$product->amount.' pcs');
            }
            $totalCartPrice += $product->price * $item['amount'];
        }
        $order = $this->orderRepo->createNew($totalCartPrice);
        // sada treba da se upisu podaci u order_items
        foreach ($cart as $item)
        {
            $product = $this->productRepo->getProductById($item['product_id']);
            $product->amount -= $item['amount'];
            $product->save();
            $this->orderItemRepo->createNew($order, $product, $item);
        }
        Session::remove('product');

        return view('thankYou');

    }

    public function addToCart(CartAddRequest $request)
    {
        $product = $this->productRepo->getProductById($request->get('id'));
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
