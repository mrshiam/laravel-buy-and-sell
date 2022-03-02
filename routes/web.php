<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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




Route::get('/dashboard', [ProductsController::class,'showOwnProducts'])->middleware(['auth','verified'])->name('dashboard');

Route::get('/', [ProductsController::class,'index'])->name('index');

Route::get('/product/{id}', [ProductsController::class,'show']);

Route::post('/product', [ProductsController::class,'store']);

Route::get('/edit/{id}', [ProductsController::class,'edit'])->middleware(['auth','verify_seller']);

Route::post('/update/{id}', [ProductsController::class,'update'])->middleware(['auth']);

Route::delete('/delete/{id}', [ProductsController::class,'destroy'])->middleware(['auth','verify_seller']);

Route::get('/sell', function () {
    return view('sell');
})->middleware(['auth']);
Route::get('order/lists',[OrderController::class,'index'])->name('order.list')->middleware(['auth']);
Route::get('order/show/{order_id}',[OrderController::class,'show'])->name('order.show')->middleware(['auth']);
Route::get('order/show/{order_id}/{status}',[OrderController::class,'update'])->name('order.change.status')->middleware(['auth']);

Route::get('add-to-cart/{product_id}', [CartController::class,'addToCart'])->name('add.to.cart');
Route::get('cart', [CartController::class,'cart'])->name('cart');
Route::get('cart.item.delete/{product_id}', [CartController::class,'removeItem'])->name('delete.item');
Route::get('checkout',[CheckoutController::class,'checkout'])->name('checkout')->middleware('check_cart');
Route::post('checkout',[CheckoutController::class,'store'])->name('place.order');
Route::get('order/success',[CheckoutController::class,'success'])->name('order.success');
require __DIR__.'/auth.php';
