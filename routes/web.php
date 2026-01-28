<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [IndexController::class, 'getProducts']);


Route::get('/product/{id}', [IndexController::class, 'getProduct']);