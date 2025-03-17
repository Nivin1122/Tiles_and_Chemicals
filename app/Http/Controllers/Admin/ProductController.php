<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'size' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'area_of_use' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Product $product) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'size' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'area_of_use' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}
