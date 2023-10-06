<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $product =  new Product($request->all());
		$product->save();
		if(!$request->ajax()) return back()->with('success', 'Product Created');
		return response()->json(['Status' => 'product Created', 'products' => $product], 201);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
