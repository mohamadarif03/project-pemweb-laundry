<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogisticsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PromoController;

Route::get('/', function () {
    return view('welcome');
});

// Guest Routes (Only accessible when NOT logged in)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

// Authenticated Routes (Only accessible when logged in)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::patch('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::get('/orders/{id}', function ($id) {
        return view('owner.order.detail');
    });

    Route::get('/pickup-delivery', [LogisticsController::class, 'index'])->name('logistics.index');
    Route::patch('/pickup/{id}/status', [LogisticsController::class, 'updatePickupStatus'])->name('pickup.updateStatus');
    Route::patch('/delivery/{id}/status', [LogisticsController::class, 'updateDeliveryStatus'])->name('delivery.updateStatus');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export/pdf', [ReportController::class, 'exportPdf'])->name('reports.exportPdf');
    Route::get('/reports/export/excel', [ReportController::class, 'exportExcel'])->name('reports.exportExcel');

    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');

    Route::resource('services', ServiceController::class)->names('services');
    Route::patch('/services/{service}/update-status', [ServiceController::class, 'updateStatus'])->name('services.update-status');

    Route::get('/promo', [PromoController::class, 'index'])->name('promo.index');
    Route::post('/promo/store', [PromoController::class, 'store'])->name('promo.store');
    Route::delete('/promo/{id}', [PromoController::class, 'destroy'])->name('promo.destroy');
    Route::patch('/promo/{id}/toggle-status', [PromoController::class, 'toggleStatus'])->name('promo.toggle-status');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});