<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
		$categoryName = $request->input('categoryName');
        $categories = Category::get();
		$products = Product::with('file','category')->where('stock', '>', 0)->get();
        if(!$request->ajax()) return view('categories.index', compact('categoryName' ,'products'));
		return response()->json(['categories' => $categories], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
