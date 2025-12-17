<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Categories - Admin only
    Route::middleware('admin')->resource('categories', CategoryController::class);

    // Products routes - urutan penting!
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    
    // Admin only - create harus sebelum route dengan parameter
    Route::middleware('admin')->group(function () {
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('products', [ProductController::class, 'store'])->name('products.store');
    });
    
    // View routes - semua user bisa lihat
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    
    // Admin only - edit dan delete
    Route::middleware('admin')->group(function () {
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    // Customers routes - urutan penting!
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    
    // Admin only - create harus sebelum route dengan parameter
    Route::middleware('admin')->group(function () {
        Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');
        Route::post('customers', [CustomerController::class, 'store'])->name('customers.store');
    });
    
    // View routes - semua user bisa lihat
    Route::get('customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    
    // Admin only - edit dan delete
    Route::middleware('admin')->group(function () {
        Route::get('customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
        Route::put('customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
        Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    });

    // Orders - Admin full access, User can create and view their own
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
    
    Route::middleware('admin')->group(function () {
        Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
        Route::put('orders/{order}', [OrderController::class, 'update'])->name('orders.update');
        Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    });
});

require __DIR__.'/auth.php';
