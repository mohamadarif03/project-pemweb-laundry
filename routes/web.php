<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('owner.dashboard');
});

Route::get('/orders', [OrderController::class, 'index'])
    ->name('orders.index');

Route::get('/pickup-delivery', function () {
    return view('owner.logistics.index');
});

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::get('/reports', function () {
    return view('owner.report.index');
});

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::patch('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

Route::get('/orders/{id}', function ($id) {
    return view('owner.order.detail');
});

Route::resource('services', \App\Http\Controllers\ServiceController::class)->names('services');
Route::patch('/services/{service}/update-status', [\App\Http\Controllers\ServiceController::class, 'updateStatus'])->name('services.update-status');

Route::get('/promo', [\App\Http\Controllers\PromoController::class, 'index'])->name('promo.index');
Route::post('/promo/store', [App\Http\Controllers\PromoController::class, 'store'])->name('promo.store');
Route::delete('/promo/{id}', [App\Http\Controllers\PromoController::class, 'destroy'])->name('promo.destroy');
Route::patch('/promo/{id}/toggle-status', [App\Http\Controllers\PromoController::class, 'toggleStatus'])->name('promo.toggle-status');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');