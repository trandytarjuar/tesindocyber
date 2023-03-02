<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    require __DIR__.'/admin.php';
});
Route::group(['prefix' => 'ecom', 'namespace' => 'ecom'], function () {
    require __DIR__.'/ecom.php';
});
