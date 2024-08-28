<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class, 'index'])->name('home.index');


// Product detail page
Route::get('/products/{id}', [HomeController::class, 'show'])->name('product.show');

use App\Http\Controllers\InvoiceController;

Route::get('/invoice/{productId}', [InvoiceController::class, 'generateInvoice'])->name('invoice.generate');
