<?php

use App\Http\Controllers\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('sanctum')->group(function(){

    Route::post('/product', [IndexController::class, 'index4']);

    Route::patch('/products/{id}', [IndexController::class, 'index5']);

    Route::delete('/products/{id}', [IndexController::class, 'index6']);
});

Route::post('/login', [IndexController::class, 'index1'])->middleware('sanctum');

Route::get('/products', [IndexController::class, 'index']);

Route::get('/products/{id}', [IndexController::class, 'index2']);

Route::get('/categories', [IndexController::class, 'index3']);
