<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Payment2Controller;

Route::get('{course}/checkout', [PaymentController::class, 'checkout'])->name('checkout');

// pruebita
Route::get('{course}/checkout2', [Payment2Controller::class, 'checkout2'])->name('checkout2');

Route::get('{course}/pay', [PaymentController::class, 'pay'])->name('pay');

// autorizacion del pago
Route::get('{course}/approved', [PaymentController::class, 'approved'])->name('approved');