<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [IndexController::class, 'getProducts']);

Route::post('/login', [AdminController::class, 'login']);




Route::get('/product/{id}', [IndexController::class, 'getProduct']);

Route::get('/auth', [IndexController::class, 'auth'])->name('login');


Route::middleware('auth:sanctum')->group(function(){

    Route::get('/admin', [AdminController::class, 'getAdminPage']);

    Route::post('/admin/products/create', [AdminController::class, 'createProuct']);

    Route::patch('/products/{id}', [AdminController::class, 'updatePost']);

    Route::delete('/products/{id}', [AdminController::class, 'deletePost']);
});