<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RegisterdController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProdukController;

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

// Route::get('/', function () {
//     return view('admin.dashboar');
// });
// Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
//     Route::get('dashboard', 'AdminController@dashboard');
//     Route::get('users', 'AdminController@users');
//     Route::get('settings', 'AdminController@settings');
// });
// Route::group(['prefix' => 'admin'], function () {
    
//     Route::get('/admin/dashboard', 'admin\DashboardController@index');
    // Route::get('users', 'AdminController@users');
    // Route::get('settings', 'AdminController@settings');
// });
// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', 'admin\DashboardController@index');
//     // tambahkan route lainnya yang terkait dengan admin di sini
// });
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
    Route::get('/register', [RegisterdController::class, 'index'])->middleware('guest');
    Route::post('/register', [RegisterdController::class, 'store'])->name('store');

    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'submit'])->name('submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/produk', [ProdukController::class, 'index'])->name('index')->middleware('auth');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('destroy')->middleware('auth');
    Route::get('/create', [ProdukController::class, 'create'])->name('create')->middleware('auth');
    Route::post('/produk', [ProdukController::class, 'store'])->name('store')->middleware('auth');
    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('show')->middleware('auth');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('edit')->middleware('auth');
    Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('update')->middleware('auth');
    Route::get('/produk/getImages', [ProdukController::class, 'getImages'])->name('getImages')->middleware('auth');
    // Route::get('/profile', 'Admin\ProfileController@index')->name('admin.profile');
    // tambahkan route lainnya yang terkait dengan admin di sini
});