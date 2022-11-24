<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('/');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/product', function () {
//     return Inertia::render('Product');
// })->name('product');
Route::get('/product', [ProductController::class, 'create'])
                ->name('product');

Route::get('/add-product', function () {
    return Inertia::render('Product/AddProduct');
})->name('add-product');

Route::post('/product', [ProductController::class, 'store'])
    ->name('product');

Route::get('/edit-product/{id}', [ProductController::class, 'edit'])
    ->name('edit-product');

    Route::post('/update-product/{id}', [ProductController::class, 'update'])
    ->name('update-product');

Route::get('/collection', [CollectionController::class, 'create'])
    ->name('collection');

Route::post('/collection', [CollectionController::class, 'store'])
    ->name('collection');

Route::get('/edit-collection/{id}', [CollectionController::class, 'edit'])
    ->name('edit-collection');

    Route::get('/add-collection', function () {
        return Inertia::render('Collection/AddCollection');
    })->name('add-collection');

    

    
    // Route::get('/discount', function () {
    //     return Inertia::render('Discount/Discount');
    // })->name('discount');

    Route::get('/discount', [DiscountController::class, 'index'])
        ->name('discount');

    Route::get('/add-discount', [DiscountController::class, 'create'])
        ->name('add-discount');

        Route::post('/discount', [DiscountController::class, 'store'])
        ->name('discount');

        Route::get('/edit-discount/{id}', [DiscountController::class, 'edit'])
    ->name('edit-discount');

    Route::post('/update-discount/{id}', [DiscountController::class, 'update'])
    ->name('update-discount');

require __DIR__.'/auth.php';
require __DIR__.'/withdrawal.php';
require __DIR__.'/order.php';
