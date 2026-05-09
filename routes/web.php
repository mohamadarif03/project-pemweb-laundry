<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('owner.dashboard');
});

Route::get('/owner/orders', function () {
    return view('owner.order.index');
});

Route::get('/owner/orders/{id}', function ($id) {
    return view('owner.order.detail');
});