<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('orders', OrderController::class);
    Route::resource('services', ServiceController::class);

    Route::get('/update-order-status', [OrderController::class, 'updateStatus'])->name('updateOrderStatus');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
