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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('payment', [\App\Http\Controllers\HomeController::class, 'payment'])->name('payment');
Route::post('payment', [\App\Http\Controllers\HomeController::class, 'postPayment'])->name('payment.post');
Route::post('paymentMethod', [\App\Http\Controllers\HomeController::class, 'postPaymentMethod'])->name('payment-method.post');

/**
 * Payment callback route is required and referring to the paymentCallback function from royryando/laravel-duitku package
 */
Route::post('callback/payment', [\App\Http\Controllers\CallbackController::class, 'paymentCallback']);
/**
 * Return callback not supported yet, create your own function
 */
Route::get('callback/return', [\App\Http\Controllers\CallbackController::class, 'myReturnCallback']);

