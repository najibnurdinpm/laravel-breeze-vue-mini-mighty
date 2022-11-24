<?php

use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/withdrawal', [WithdrawalController::class, 'index'])
    ->name('withdrawal');
Route::post('/approve-withdrawal', [WithdrawalController::class, 'store'])
    ->name('approve-withdrawal');
    Route::get('/approve-withdrawal', [WithdrawalController::class, 'store'])
    ->name('approve-withdrawal');
    Route::post('/update-withdrawal/{id}', [WithdrawalController::class, 'update'])
    ->name('update-withdrawal');
