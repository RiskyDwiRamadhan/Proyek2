<?php

use App\Http\Controllers\GoodsController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\BuyerController;
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

Route::view('/', 'shop.index');
Route::view('/details', 'shop.detail');
Route::view('/carts', 'shop.cart');
Route::view('/checkouts', 'shop.checkout');

Auth::routes();

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::view('admin/dashboard', 'layouts.admin.master');
    Route::resource('sellers', SellerController::class);
    Route::resource('buyers', BuyerController::class);
});

Route::middleware(['auth', 'role:penjual'])->group(function () {
    Route::view('penjual/dashboard', 'layouts.admin.master');
});

Route::middleware(['auth', 'role:admin,penjual'])->group(function () {
    Route::resource('goods', GoodsController::class);
});

Route::middleware(['auth', 'role:pembeli'])->group(function () {
    Route::view('pembeli/dashboard', 'layouts.admin.master');
});
