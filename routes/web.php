<?php

use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PriceController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// crud barcode
Route::get('/barcodes', [BarcodeController::class, 'index'])->name('barcodes.index');
Route::get('/barcodes/create', [BarcodeController::class, 'create'])->name('barcodes.create');
Route::post('/barcodes', [BarcodeController::class, 'store'])->name('barcodes.store');
Route::get('/barcodes/{barcode}/edit', [BarcodeController::class, 'edit'])->name('barcodes.edit');
Route::put('/barcodes/{barcode}', [BarcodeController::class, 'update'])->name('barcodes.update');
Route::delete('/barcodes/{barcode}', [BarcodeController::class, 'destroy'])->name('barcodes.destroy');
Route::get('/barcodes/{barcode}', [BarcodeController::class, 'show'])->name('barcodes.show');

// crud prices
Route::get('/prices', [PriceController::class, 'index'])->name('prices.index');
Route::get('/prices/create', [PriceController::class, 'create'])->name('prices.create');
Route::post('/prices', [PriceController::class, 'store'])->name('prices.store');
Route::get('/prices/{price}/edit', [PriceController::class, 'edit'])->name('prices.edit');
Route::put('/prices/{price}', [PriceController::class, 'update'])->name('prices.update');
Route::delete('/prices/{price}', [PriceController::class, 'destroy'])->name('prices.destroy');
Route::get('/prices/{price}', [PriceController::class, 'show'])->name('prices.show');
