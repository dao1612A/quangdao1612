<?php


Route::middleware('permission:group_acl|full')->group(function (){
    Route::prefix('permission')->namespace('Acl')->group(function (){
        Route::get('/', 'AdminPermissionController@index')->name('get_admin.permission.index')->middleware('permission:permission_index|full');
        Route::get('/create', 'AdminPermissionController@create')->name('get_admin.permission.create')->middleware('permission:permission_create|full');
        Route::post('/create', 'AdminPermissionController@store');
        Route::get('update/{id}', 'AdminPermissionController@edit')->name('get_admin.permission.edit')->middleware('permission:permission_edit|full');
        Route::post('update/{id}', 'AdminPermissionController@update');
        Route::get('delete/{id}', 'AdminPermissionController@delete')->name('get_admin.permission.delete')->middleware('permission:permission_delete|full');
    });

    Route::prefix('role')->namespace('Acl')->group(function (){
        Route::get('/', 'AdminRoleController@index')->name('get_admin.role.index')->middleware('permission:role_index|full');
        Route::get('/create', 'AdminRoleController@create')->name('get_admin.role.create')->middleware('permission:role_create|full');
        Route::post('/create', 'AdminRoleController@store');
        Route::get('update/{id}', 'AdminRoleController@edit')->name('get_admin.role.edit')->middleware('permission:role_edit|full');
        Route::post('update/{id}', 'AdminRoleController@update');
        Route::get('delete/{id}', 'AdminRoleController@delete')->name('get_admin.role.delete')->middleware('permission:role_delete|full');
    });


    Route::prefix('account')->namespace('Acl')->group(function (){
        Route::get('/', 'AdminAccountController@index')->name('get_admin.account.index')->middleware('permission:admin_index|full');
        Route::get('/create', 'AdminAccountController@create')->name('get_admin.account.create')->middleware('permission:admin_create|full');
        Route::post('/create', 'AdminAccountController@store');
        Route::get('update/{id}', 'AdminAccountController@edit')->name('get_admin.account.edit')->middleware('permission:admin_edit|full');
        Route::post('update/{id}', 'AdminAccountController@update');
        Route::get('delete/{id}', 'AdminAccountController@delete')->name('get_admin.account.delete')->middleware('permission:admin_delete|full');
    });

});
