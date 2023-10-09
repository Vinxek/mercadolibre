<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\product\ProductUpdateRequest;

class ProductController extends Controller
{
	use UploadFile;

    public function home()
    {
		$products = Product::with('category', 'file')->get();
        return view('index', compact("products"));
    }

    public function index()
    {
		$products = Product::with('category', 'file')->get();
        return view('products.index', compact("products"));
    }


    public function store(ProductRequest $request)
	{
		try {
			DB::beginTransaction();
			$product = new Product($request->all());
			$product->save();
			$this->uploadFile($product, $request);
			DB::commit();
			return response()->json([],201);
		} catch (\Throwable $th) {
			DB::rollBack();
		}
	}


    public function show(Product $product)
    {
        return response()->json(['product'],200);
    }

    public function update(ProductUpdateRequest $request, product $product)
	{	try {
		DB::beginTransaction();
		$product->update($request->all());
		$this->uploadFile($product, $request);
		DB::commit();
		return response()->json([],201);
	} catch (\Throwable $th) {
		DB::rollBack();
	}
	}


    public function destroy(Product $product)
    {
        $product->delete();
		$this->deleteFile($product);
		return response()->json([],204);
    }
}
