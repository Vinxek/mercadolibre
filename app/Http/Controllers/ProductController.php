<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductRequest;

class ProductController extends Controller
{

    public function home()
    {
		$products = Product::get();
        return view('index', compact("products"));
    }

    public function index()
    {
		$products = Product::with('category')->get();
        return view('products.index', compact("products"));
    }


    public function store(ProductRequest $request)
    {
        $product =  new Product($request->all());
		$product->save();
		if(!$request->ajax()) return back()->with('success', 'Product Created');
		return response()->json(['Status' => 'product Created', 'products' => $product], 201);
    }


    public function show(Product $product)
    {
        return response()->json(['product'],200);
    }

    public function update(ProductRequest $request, Product $product)
    {
		$product->update($request->all());
        return response()->json([],204);
    }


    public function destroy(Product $product)
    {
        $product->delete();
		return response()->json([],204);
    }
}
