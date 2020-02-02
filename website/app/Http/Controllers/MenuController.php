<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MenuController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('menu', [
            'products' => $products
        ]);
    }
}
