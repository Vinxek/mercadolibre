<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthUserAPIController;


Route::post('/login',[AuthUserAPIController::class, 'login']);
Route::post('/register',[UserController::class, 'store'] );

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum']], function (){
	Route::post('/logout', [AuthUserAPIController::class, 'logout']);
	Route::get('/profile', [AuthUserAPIController::class, 'profile']);

	Route::group(['prefix' => 'users', 'controller' => UserController::class ], function(){
		Route::get('/', 'index');
		Route::get('/{user}', 'show');
		Route::post('/store', 'store');
		Route::put('/update/{user}', 'update');
		Route::delete('/delete/{user}', 'destroy');
	});
});
