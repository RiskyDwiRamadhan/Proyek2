<?php

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

Route::view('/', 'layouts.shop.master');

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::view('admin/dashboard', 'layouts.admin.master');
});

Route::middleware(['auth', 'penjual'])->group(function () {
    Route::view('penjual/dashboard', 'layouts.admin.master');
});

Route::middleware(['auth', 'pembeli'])->group(function () {
    Route::view('pembeli/dashboard', 'layouts.admin.master');
});
