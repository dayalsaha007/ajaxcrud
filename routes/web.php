<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::controller(ProductController::class)->group(function(){
    Route::get('/', 'product')->name('product');
    Route::post('/add/product', 'add_product')->name('add_product');
    Route::post('/update/product', 'update_product')->name('update_product');
    Route::post('/delete/product', 'delete_product')->name('delete_product');

});
