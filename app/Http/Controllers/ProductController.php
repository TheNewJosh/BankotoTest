<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('product');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'name' => 'required',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'tag' => $request->tag,
            'size' => $request->size,
            'weight' => $request->weight,
            'sku_id' => $request->sku_id,
            'colour' => $request->colour,
        ]);

        return redirect()->back()->with('status', 'Save');
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'title' => 'required',
        ]);

        $product->update([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'tag' => $request->tag,
            'size' => $request->size,
            'weight' => $request->weight,
            'sku_id' => $request->sku_id,
            'colour' => $request->colour,
        ]);

        return redirect()->back()->with('status', 'Save');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('status', 'Deleteted');
    }
}
