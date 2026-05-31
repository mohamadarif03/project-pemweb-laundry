<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
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

// Route::get('/customers', function () {
//     return view('owner.customer.index');
// });

// Route::get('/customers/create', function () {
//     return view('owner.customer.create');
// });

// Route::get('/customers/{id}/edit', function ($id) {
//     return view('owner.customer.update');
// });

Route::get('/customers/edit/{id}',
    [CustomerController::class, 'edit'])
    ->name('customers.edit');

// Route::get('/services', function () {
//     return view('owner.service.index');
// });

Route::get('/reports', function () {
    return view('owner.report.index');
});

// Customer Routes
Route::get('/customers', [CustomerController::class, 'index'])
    ->name('customers.index');

Route::post('/customers/store', [CustomerController::class, 'store'])
    ->name('customers.store');

Route::get('/customers/edit/{id}', [CustomerController::class, 'edit'])
    ->name('customers.edit');

Route::put('/customers/update/{id}', [CustomerController::class, 'update'])
    ->name('customers.update');

Route::delete('/customers/delete/{id}', [CustomerController::class, 'destroy'])
    ->name('customers.destroy');

Route::patch('/customers/status/{id}', [CustomerController::class, 'updateStatus'])
    ->name('customers.status');

// Review Routes
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::get('/profile', function () {
    return view('owner.profile.index');
});

// Order Routes
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::patch('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

Route::get('/orders/{id}', function ($id) {
    return view('owner.order.detail');
});

// Service Routes
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
Route::delete('/services/delete/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
Route::resource('services', \App\Http\Controllers\ServiceController::class)->names('services');
Route::patch('/services/{service}/update-status', [\App\Http\Controllers\ServiceController::class, 'updateStatus'])->name('services.update-status');

// Promo Routes
Route::get('/promo', [\App\Http\Controllers\PromoController::class, 'index'])->name('promo.index');
Route::post('/promo/store', [App\Http\Controllers\PromoController::class, 'store'])->name('promo.store');
Route::delete('/promo/{id}', [App\Http\Controllers\PromoController::class, 'destroy'])->name('promo.destroy');
Route::patch('/promo/{id}/toggle-status', [App\Http\Controllers\PromoController::class, 'toggleStatus'])->name('promo.toggle-status');