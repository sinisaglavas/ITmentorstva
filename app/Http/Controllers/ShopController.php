<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $allProducts = Product::all();

        /*
            * izvuci poslednjih 6 proizvoda i ispisati ih na stranici
         */
        $descProducts = Product::orderBy('created_at', 'desc')
            ->take(6)
            ->get();


        return view('shop', compact('allProducts', 'descProducts'));
    }
}
