<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('allProducts', compact('products'));
    }

    public function addProductForm()
    {
        return view('addProduct');
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|integer',
            'price' => 'required|numeric', // celi i decimalni brojevi
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // image → validira da je fajl slika / mimes → dozvoljeni formati
            'description' => 'required|string'
        ]);
        Product::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'image' => $request->get('image')
        ]);

        return redirect('/admin/all-products');
    }

    public function delete($product)
    {
        $singleProduct = Product::where(['id' => $product])->first();
        $singleProduct->delete();

        return redirect()->back();
    }
}
