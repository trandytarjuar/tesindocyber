<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RegisterdController;

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
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/register', [RegisterdController::class, 'index']);
    Route::post('/register', [RegisterdController::class, 'store'])->name('store');
    // Route::get('/profile', 'Admin\ProfileController@index')->name('admin.profile');
    // tambahkan route lainnya yang terkait dengan admin di sini
});