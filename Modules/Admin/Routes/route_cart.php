
<?php

Route::prefix('transaction')->namespace('Cart')->group(function (){
    Route::get('/', 'AdminTransactionController@index')->name('get_admin.transaction.index')->middleware('permission:transaction_index|full');
    Route::get('/{idTransaction}/edit', 'AdminTransactionController@edit')->name('get_admin.transaction.edit')->middleware('permission:transaction_edit|full');
    Route::post('/{idTransaction}/edit', 'AdminTransactionController@update')->middleware('permission:transaction_edit|full');
});
