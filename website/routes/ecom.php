<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ecom\HomeController;
use App\Http\Controllers\ecom\AuthController;
use App\Http\Controllers\ecom\CartController;

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



// Route::prefix('ecom')->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    
    Route::post('/addtocart/{id}', [CartController::class, 'addtocart'])->name('addtocart');
    Route::post('/cekout/{id}', [CartController::class, 'cekout'])->name('cekout');
    Route::post('/delete/{id}', [CartController::class, 'delete'])->name('delete');
    Route::get('/countKeranjang', [CartController::class, 'countKeranjang'])->name('countKeranjang');
    Route::get('/detail/{id}', [CartController::class, 'detail'])->name('detail');
// });