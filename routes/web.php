<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Роуты для товаров
Route::resource('products', ProductController::class);

// Роуты для заказов
Route::resource('orders', OrderController::class);
Route::post('orders/{order}/complete', [OrderController::class, 'complete'])
    ->name('orders.complete');

// Домашняя страница перенаправляет на список товаров
Route::redirect('/', '/products');
