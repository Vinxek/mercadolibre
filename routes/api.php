<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'users', 'controller' => UserController::class ], function(){
	Route::get('/', 'index');
	Route::post('/store', 'store');
	Route::put('/update/{user}', 'update');
	Route::delete('/delete/{user}', 'destroy');
});
