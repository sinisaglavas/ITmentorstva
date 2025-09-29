<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    // DI Dependency Injection
    // Imamo stalni pristup Product model-u

    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }
    // Od sada je Product model stalno ucitan kada god pozovemo ProductRepository

    public function createNew($request)
    {
        $this->productModel->create([ // ne pozivamo staticki jer vec imamo prethodno ucitan model
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'image' => $request->get('image'),
        ]);
    }

    public function getProductById($id)
    {
        return $this->productModel->where(['id' => $id])->first();
    }

    public function editProduct($product, $request)
    {
        $product->name = $request->get('name');
        $product->amount = $request->get('amount');
        $product->price = $request->get('price');
        $product->image = $request->get('image');
        $product->description = $request->get('description');
        $product->save();
    }
}
