<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products', ProductController::class);
Route::resource('/supplier', SupplierController::class);
Route::resource('/transaction', TransactionController::class);
Route::resource('/dashboard', DashboardController::class);
