<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Auth::routes();
Route::get('/', [ProductController::class, 'home'])->name('product.home');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/home', [HomeController::class, 'index'])->name('home');

	Route::group(['prefix' => 'users', 'middleware'=>['role:admin'], 'controller' => UserController::class], function () {
		Route::get('/', 'index')->name('users.index');
		Route::get('/create', 'create')->name('users.create');
		Route::post('/', 'store')->name('users.store');
		Route::get('/{user}/edit', 'edit')->name('users.edit');
		Route::put('/{user}', 'update')->name('users.update');
		Route::delete('/{user}', 'destroy')->name('users.destroy');
	});
	Route::group(['prefix' => 'products', 'middleware'=>['role:admin'], 'controller' => ProductController::class], function () {
		Route::get('/', 'index')->name('products.index');
		Route::get('/show/{product}', 'show')->name('products.show');
		Route::post('/store', 'store')->name('products.store');
		Route::get('/{product}/edit', 'edit')->name('products.edit');
		Route::post('/update/{product}', 'update')->name('products.update');
		Route::delete('/{product}', 'destroy')->name('products.destroy');
	});
	Route::group(['prefix' => 'categories', 'middleware'=>['role:admin'], 'controller' => CategoryController::class], function () {
		Route::get('/', 'index')->name('categories.index');
		Route::get('/get-all', 'index')->name('categories.get-all');
		Route::get('/create', 'create')->name('categories.create');
		Route::post('/', 'store')->name('categories.store');
		Route::get('/{category}/edit', 'edit')->name('categories.edit');
		Route::put('/{category}', 'update')->name('categories.update');
		Route::delete('/{category}', 'destroy')->name('categories.destroy');
	});


});
