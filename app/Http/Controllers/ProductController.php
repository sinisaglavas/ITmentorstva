<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    private $productRepo;
    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    public function index()
    {
        $products = Product::all();

        return view('allProducts', compact('products'));
    }

    public function addProduct(SaveProductRequest $request)
    {
        $this->productRepo->createNew($request); // koristimo ProductRepository i metodu unutar njega

        return redirect('/admin/all-products');
    }

    public function delete($product)
    {
        $singleProduct = $this->productRepo->getProductById($product);
        $singleProduct->delete();

        return redirect()->route('adminAllProducts');
    }

    public function updateProductForm(Product $product)
    {
        return view('updateProductForm', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|',
            'amount' => 'required|integer',
            'price' => 'required|numeric', // celi i decimalni brojevi
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'required|string',
        ]);

        $this->productRepo->editProduct($product, $request);

        return redirect()->route('adminAllProducts');
    }
}
