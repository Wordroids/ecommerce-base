<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController; // Add CategoryController for Category CRUD
use App\Http\Controllers\MakeController;
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VariantController;
use Illuminate\Support\Facades\Route;

Route::get('/linkstorage', function () {
    Illuminate\Support\Facades\Artisan::call('storage:link');
});

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {

    // Admin routes (role: admin)
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {

        // Admin Dashboard
        Route::get('/dashboard', function () {
            return view('pages.admin.dashboard');
        })->name('dashboard');

        // Products CRUD Routes
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        // Category CRUD Routes
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        //Makes , Models , Variant CRUD Resources
        Route::resource('makes', MakeController::class);
        Route::resource('models', ModelsController::class);
        Route::resource('variants', VariantController::class);

        
        
    });

    // Customer routes (role: customer)
    Route::middleware(['role:customer'])->group(function () {
        // Add any customer-specific routes here
    });

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/get-models/{make_id}', [ProductController::class, 'getModels']);
        Route::get('/get-variants/{model_id}', [ProductController::class, 'getVariants']);
/** 
 * Notes for Product Resource Routes:
 * 
 * GET /products (index) – Display a list of all products
 * GET /products/create (create) – Show a form for creating a new product
 * POST /products (store) – Store a newly created product
 * GET /products/{product} (show) – Display a specific product
 * GET /products/{product}/edit (edit) – Show a form for editing a product
 * PUT /products/{product} (update) – Update a specific product
 * DELETE /products/{product} (destroy) – Delete a specific product
 */

require __DIR__ . '/auth.php';
