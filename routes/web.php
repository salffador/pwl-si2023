<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products', ProductController::class);
Route::resource('/supplier', SupplierController::class);
Route::resource('/transaction', TransactionController::class);
Route::resource('/dashboard', DashboardController::class);

Route::get('/send-email/{to}/{id}', [\App\Http\Controllers\TransactionController::class, 'sendEmail']);
