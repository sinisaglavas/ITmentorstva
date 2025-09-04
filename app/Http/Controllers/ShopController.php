<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        //$products = ['iPhone 10', 'Samsung 10+', 'Xiaomi 20+', 'Samsung Note 20+'];
        $allProducts = Products::all();

        /*
            * izvuci poslednjih 6 proizvoda i ispisati ih na stranici
         */
        $descProducts = Products::orderBy('created_at', 'desc')
            ->take(6)
            ->get();


        return view('shop', compact('allProducts', 'descProducts'));
    }
}
