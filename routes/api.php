<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

Route::get('/user', function (Request $request) {
    return Hash::make('666');
});


Route::middleware('auth:sanctum')->group(function(){

    Route::post('/admin/products/create', [AdminController::class, 'createProuct']);

    Route::patch('/products/{id}', [AdminController::class, 'updatePost']);

    Route::delete('/products/{id}', [AdminController::class, 'deletePost']);
});


Route::post('/login', [AdminController::class, 'login']);

Route::post('/checkAuth', [AdminController::class, 'checkAuth']);

Route::get('/products', [IndexController::class, 'getProducts']);

Route::get('/products/{id}', [IndexController::class, 'getProduct']);

Route::get('/categories', [IndexController::class, 'getCategories']);
