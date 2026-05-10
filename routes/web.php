<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('owner.dashboard');
});

Route::get('/orders', function () {
    return view('owner.order.index');
});

Route::get('/pickup-delivery', function () {
    return view('owner.logistics.index');
});

Route::get('/customers', function () {
    return view('owner.customer.index');
});

Route::get('/customers/create', function () {
    return view('owner.customer.create');
});

Route::get('/customers/{id}/edit', function ($id) {
    return view('owner.customer.update');
});

// Route::get('/services', function () {
//     return view('owner.service.index');
// });

Route::get('/reports', function () {
    return view('owner.report.index');
});

Route::get('/promo', function () {
    return view('owner.promo.index');
});

Route::get('/reviews', function () {
    return view('owner.review.index');
});

Route::get('/profile', function () {
    return view('owner.profile.index');
});

Route::get('/orders/create', function () {
    return view('owner.order.create');
});

Route::get('/orders/{id}/edit', function ($id) {
    return view('owner.order.update');
});

Route::get('/orders/{id}', function ($id) {
    return view('owner.order.detail');
});


Route::resource('services', \App\Http\Controllers\ServiceController::class)->names('services');
