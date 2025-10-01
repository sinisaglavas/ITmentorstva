<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

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

    public function permalink(Product $product)
    {
        return view('permalink', compact('product'));
    }

    public function addProduct(SaveProductRequest $request)
    {
        $this->productRepo->createNew($request); // koristimo ProductRepository i metodu unutar njega

        return redirect('/admin/product/all');
    }

    public function delete($product)
    {
        $singleProduct = $this->productRepo->getProductById($product);
        $singleProduct->delete();

        return redirect('/admin/product/all');
    }

    public function updateProductForm(Product $product)
    {
        return view('updateProductForm', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->productRepo->editProduct($product, $request);

        return redirect('/admin/product/all');
    }
}
