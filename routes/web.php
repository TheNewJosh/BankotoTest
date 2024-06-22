<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MediaUploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/media', [App\Http\Controllers\HomeController::class, 'media'])->name('media');

Route::resource('products', ProductController::class);
Route::post('product/update', [ProductController::class, 'update'])->name('productUpdate');
Route::get('product/Destroy/{product}', [ProductController::class, 'destroy'])->name('productsDestroy');

Route::resource('media_uploads', MediaUploadController::class);
Route::post('media/update', [MediaUploadController::class, 'update'])->name('mediaUpdate');
Route::get('media/Destroy/{media}', [MediaUploadController::class, 'destroy'])->name('mediasDestroy');
