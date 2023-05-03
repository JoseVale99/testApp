<?php

use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

// midleware auth group

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index')
        ->middleware('can:categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create')
        ->middleware('can:categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store')
        ->middleware('can:categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit')
        ->middleware('can:categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update')
        ->middleware('can:categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy')
        ->middleware('can:categories.destroy');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show')
        ->middleware('can:categories.show');

    // crud barcode
    Route::get('/barcodes', [BarcodeController::class, 'index'])->name('barcodes.index')
        ->middleware('can:barcodes.index');
    Route::get('/barcodes/create', [BarcodeController::class, 'create'])->name('barcodes.create')
        ->middleware('can:barcodes.create');
    Route::post('/barcodes', [BarcodeController::class, 'store'])->name('barcodes.store')
        ->middleware('can:barcodes.store');
    Route::get('/barcodes/{barcode}/edit', [BarcodeController::class, 'edit'])->name('barcodes.edit')
        ->middleware('can:barcodes.edit');
    Route::put('/barcodes/{barcode}', [BarcodeController::class, 'update'])->name('barcodes.update')
        ->middleware('can:barcodes.update');
    Route::delete('/barcodes/{barcode}', [BarcodeController::class, 'destroy'])->name('barcodes.destroy')
        ->middleware('can:barcodes.destroy');
    Route::get('/barcodes/{barcode}', [BarcodeController::class, 'show'])->name('barcodes.show')
        ->middleware('can:barcodes.show');

    // crud prices
    Route::get('/prices', [PriceController::class, 'index'])->name('prices.index')
        ->middleware('can:prices.index');
    Route::get('/prices/create', [PriceController::class, 'create'])->name('prices.create')
        ->middleware('can:prices.create');
    Route::post('/prices', [PriceController::class, 'store'])->name('prices.store')
        ->middleware('can:prices.store');
    Route::get('/prices/{price}/edit', [PriceController::class, 'edit'])->name('prices.edit')
        ->middleware('can:prices.edit');
    Route::put('/prices/{price}', [PriceController::class, 'update'])->name('prices.update')
        ->middleware('can:prices.update');
    Route::delete('/prices/{price}', [PriceController::class, 'destroy'])->name('prices.destroy')
        ->middleware('can:prices.destroy');
    Route::get('/prices/{price}', [PriceController::class, 'show'])->name('prices.show')
        ->middleware('can:prices.show');


    // crud de products

    Route::get('/products', [ProductController::class, 'index'])->name('products.index')
        ->middleware('can:products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')
        ->middleware('can:products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store')
        ->middleware('can:products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit')
        ->middleware('can:products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update')
        ->middleware('can:products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')
        ->middleware('can:products.destroy');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show')
        ->middleware('can:products.show');
});
