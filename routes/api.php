<?php

use App\Http\Controllers\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('sanctum')->group(function(){

    Route::post('/product', [IndexController::class, 'index']);

    Route::patch('/products/{id}', [IndexController::class, 'index']);

    Route::delete('/products/{id}', [IndexController::class, 'index']);
});

Route::post('/login', [IndexController::class, 'index'])->middleware('sanctum');

Route::get('/products', [IndexController::class, 'index']);

Route::get('/products/{id}', [IndexController::class, 'index']);

Route::get('/categories', [IndexController::class, 'index']);