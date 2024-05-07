<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->get();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    // public function store(Request $request)
    // {
    //     if (!$request->filled('image')) {
    //         # code...
    //         return redirect()->back()->with('error', 'Image is required');
    //     }
    // }
    public function store(Request $request)
    {
        $requestData = $request->only(['image', 'name', 'condition', 'stock', 'price', 'weight', 'description']);

        foreach ($requestData as $key => $value) {
            if (!$request->filled($key)) {
                return redirect()->back()->with('error', ucfirst($key) . ' is required');
            }
        }

        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'weight' => $request->weight,
            'image' => $request->image,
            'condition' => $request->condition,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('products.index')->with('success', 'Product created Successfully');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'image' => 'required|string',
            'name' => 'required|string',
            'condition' => 'required|in:baru,bekas',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'weight' => 'required|string',
            'description' => 'required|string',
        ]);

        $product->update([
            'image' => $request->image,
            'name' => $request->name,
            'condition' => $request->condition,
            'stock' => $request->stock,
            'price' => $request->price,
            'weight' => $request->weight,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.index')->with('success', 'Product updated successfully');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.index')->with('success', 'Product deleted successfully');
    }
}
