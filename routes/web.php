<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
        
        Route::get('/dashboard', function () {
            return view('pages.admin.dashboard');
        })->name('dashboard');

        //Products
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    });

    Route::middleware(['role:customer'])->group(function () {});

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /***   This resource route will automatically create the following routes:
     * GET /products (index) – Display a list of all products
     * GET /products/create (create) – Show a form for creating a new product
     * POST /products (store) – Store a newly created product
     * GET /products/{product} (show) – Display a specific product
     * GET /products/{product}/edit (edit) – Show a form for editing a product
     * PUT /products/{product} (update) – Update a specific product
     * DELETE /products/{product} (destroy) – Delete a specific product */
});




require __DIR__ . '/auth.php';
