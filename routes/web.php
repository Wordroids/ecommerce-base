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

        Route::resource('products', ProductController::class);
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
