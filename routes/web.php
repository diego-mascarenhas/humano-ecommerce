<?php

use Illuminate\Support\Facades\Route;
use Idoneo\HumanoEcommerce\Http\Controllers\ProductController;
use Idoneo\HumanoEcommerce\Http\Controllers\OrderController;

Route::middleware(['web', 'auth'])->group(function ()
{
	// Stores
	Route::get('/stores', function () {
		return redirect()->route('products.index');
	})->name('stores.index');

	// Products
	Route::get('/products', [ProductController::class, 'index'])->name('products.index');
	Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

	// Orders
	Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
	Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});


