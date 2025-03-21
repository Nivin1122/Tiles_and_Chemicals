<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\CustomerController;



Route::get('/', [UserProductController::class, 'index'])->name('userside.pages.list_products');

Route::get('/become-a-customer', [CustomerController::class, 'create'])->name('customer.create');

Route::post('/become-a-customer', [CustomerController::class, 'store'])->name('customer.store');

Route::get('/admin/customers', [AdminCustomerController::class, 'index'])->name('admin.customers.index');


Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.auth.login');

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    
    // Route::get('/products/{product}', [UserProductController::class, 'show'])->name('products.show');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            $products = \App\Models\Product::with('category')->get();
            return view('admin.pages.dashboard', compact('products'));
        })->name('admin.pages.dashboard');

        Route::resource('categories', CategoryController::class)->names('admin.categories');

        Route::resource('products', ProductController::class)->names('admin.products');
    });
});
