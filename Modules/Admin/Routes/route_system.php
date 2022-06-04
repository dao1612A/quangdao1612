<?php
Route::group(['namespace' => 'System'], function (){
    Route::prefix('navbar')->group(function (){
        Route::get('/', 'AdminNavbarController@index')->name('get_admin.navbar.index')->middleware('permission:navbar_index|full');
        Route::get('/create', 'AdminNavbarController@create')->name('get_admin.navbar.create')->middleware('permission:navbar_create|full');
        Route::post('/create', 'AdminNavbarController@store');
        Route::get('update/{id}', 'AdminNavbarController@edit')->name('get_admin.navbar.edit')->middleware('permission:navbar_edit|full');
        Route::post('update/{id}', 'AdminNavbarController@update');
        Route::get('delete/{id}', 'AdminNavbarController@delete')->name('get_admin.navbar.delete')->middleware('permission:navbar_delete|full');
        Route::get('type/{type?}','AdminNavbarController@getType')->name('get_admin_ajax.navbar.type');
    });
    Route::prefix('location')->group(function (){
        Route::get('/', 'AdminLocationController@index')->name('get_admin.location.index')->middleware('permission:location_index|full');
        Route::get('/create', 'AdminLocationController@create')->name('get_admin.location.create')->middleware('permission:location_create|full');
        Route::post('/create', 'AdminLocationController@store');
        Route::get('update/{id}', 'AdminLocationController@edit')->name('get_admin.location.edit')->middleware('permission:location_edit|full');
        Route::post('update/{id}', 'AdminLocationController@update');
        Route::get('delete/{id}', 'AdminLocationController@delete')->name('get_admin.location.delete')->middleware('permission:location_delete|full');
    });
    Route::prefix('seo-product')->group(function (){
        Route::get('/', 'AdminSeoProductController@index')->name('get_admin.seo_product.index')->middleware('permission:seo_product_index|full');
    });
    Route::prefix('phone-support')->group(function (){
        Route::get('/', 'AdminPhoneSupportController@index')->name('get_admin.phone_support.index')->middleware('permission:phone_support_index|full');
        Route::get('/create', 'AdminPhoneSupportController@create')->name('get_admin.phone_support.create')->middleware('permission:phone_support_create|full');
        Route::post('/create', 'AdminPhoneSupportController@store');
        Route::get('update/{id}', 'AdminPhoneSupportController@edit')->name('get_admin.phone_support.edit')->middleware('permission:phone_support_edit|full');
        Route::post('update/{id}', 'AdminPhoneSupportController@update');
        Route::get('delete/{id}', 'AdminPhoneSupportController@delete')->name('get_admin.phone_support.delete')->middleware('permission:phone_support_delete|full');
    });
    Route::prefix('branch')->group(function (){
        Route::get('/', 'AdminBranchController@index')->name('get_admin.branch.index')->middleware('permission:branch_index|full');
        Route::get('/create', 'AdminBranchController@create')->name('get_admin.branch.create')->middleware('permission:branch_create|full');
        Route::post('/create', 'AdminBranchController@store');
        Route::get('update/{id}', 'AdminBranchController@edit')->name('get_admin.branch.edit')->middleware('permission:branch_edit|full');
        Route::post('update/{id}', 'AdminBranchController@update');
        Route::get('delete/{id}', 'AdminBranchController@delete')->name('get_admin.branch.delete')->middleware('permission:branch_delete|full');
    });
    Route::prefix('config-link')->group(function (){
        Route::get('/', 'AdminLinkFooterController@index')->name('get_admin.config_link.index')->middleware('permission:config_link_index|full');
        Route::get('/create', 'AdminLinkFooterController@create')->name('get_admin.config_link.create')->middleware('permission:config_link_create|full');
        Route::post('/create', 'AdminLinkFooterController@store');
        Route::get('update/{id}', 'AdminLinkFooterController@edit')->name('get_admin.config_link.edit')->middleware('permission:config_link_edit|full');
        Route::post('update/{id}', 'AdminLinkFooterController@update');
        Route::get('delete/{id}', 'AdminLinkFooterController@delete')->name('get_admin.config_link.delete')->middleware('permission:config_link_delete|full');
    });
    Route::prefix('email')->group(function (){
        Route::get('/', 'AdminConfigEmailController@index')->name('get_admin.email.index')->middleware('permission:email_index|full');
        Route::post('/', 'AdminConfigEmailController@store')->middleware('permission:email_edit|full');
    });

    Route::prefix('promotion-code')->group(function (){
        Route::get('/', 'AdminPromotionCodeController@index')->name('get_admin.promotion_code.index')->middleware('permission:promotion_code_index|full');
        Route::get('/create', 'AdminPromotionCodeController@create')->name('get_admin.promotion_code.create')->middleware('permission:promotion_code_create|full');
        Route::post('/create', 'AdminPromotionCodeController@store');
        Route::get('update/{id}', 'AdminPromotionCodeController@edit')->name('get_admin.promotion_code.edit')->middleware('permission:promotion_code_edit|full');
        Route::post('update/{id}', 'AdminPromotionCodeController@update');
        Route::get('delete/{id}', 'AdminPromotionCodeController@delete')->name('get_admin.promotion_code.delete')->middleware('permission:promotion_code_delete|full');
    });
});