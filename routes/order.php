<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/order', function () {
    return Inertia::render('Order/Order');
})->name('order');