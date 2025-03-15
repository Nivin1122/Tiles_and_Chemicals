<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(6);
        return view('userside.pages.list_products', compact('products'));
    }

    
    // public function show(Product $product)
    // {
    //     return view('userside.pages.product_details', compact('product'));
    // }
}
