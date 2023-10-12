<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
	{
		$categories = Category::get();
		if (!$request->ajax()) return view('categories.index');
		return response()->json(['categories' => $categories], 200);
	}

	public function manage(Request $request){
		$categories = Category::get();
		return view('categories.crud', compact('categories'));
	}

	public function category(Request $request)
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
        try {
			DB::beginTransaction();
			$category = new Category($request->all());
			$category->save();
			DB::commit();
			return response()->json([],201);
		} catch (\Throwable $th) {
			DB::rollBack();
		}
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(CategoryRequest $request, Category $category)
    {
        try {
			DB::beginTransaction();
			$category->update($request->all());
			DB::commit();
			return response()->json([],201);
		} catch (\Throwable $th) {
			DB::rollBack();
		}
    }


    public function destroy($id)
    {
        //
    }
}
