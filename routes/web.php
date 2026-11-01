<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);

Route::resource('stock-ins', StockInController::class)
    ->only(['index', 'create', 'store']);

Route::resource('stock-outs', StockOutController::class)
    ->only(['index', 'create', 'store']);
