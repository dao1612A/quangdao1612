<?php
Route::group(['namespace' => 'Ecommerce'], function (){
    Route::prefix('product')->group(function (){
        Route::get('/', 'AdminProductController@index')->name('get_admin.product.index')->middleware('permission:product_index|full');
        Route::get('/create', 'AdminProductController@create')->name('get_admin.product.create')->middleware('permission:product_create|full');
        Route::post('/create', 'AdminProductController@store');
        Route::get('update/{id}', 'AdminProductController@edit')->name('get_admin.product.edit')->middleware('permission:product_edit|full');
        Route::post('update/{id}', 'AdminProductController@update');
        Route::get('delete/{id}', 'AdminProductController@delete')->name('get_admin.product.delete')->middleware('permission:product_delete|full');
    });
});