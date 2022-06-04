
<?php

Route::prefix('blog')->namespace('Blog')->middleware('permission:group_article|full')->group(function (){

    Route::prefix('keyword')->group(function (){
        Route::get('/', 'AdminKeywordController@index')->name('get_admin.keyword.index')->middleware('permission:keyword_index|full');
        Route::get('/create', 'AdminKeywordController@create')->name('get_admin.keyword.create')->middleware('permission:keyword_create|full');
        Route::post('/create', 'AdminKeywordController@store');
        Route::get('update/{id}', 'AdminKeywordController@edit')->name('get_admin.keyword.edit')->middleware('permission:keyword_edit|full');
        Route::post('update/{id}', 'AdminKeywordController@update');
        Route::get('delete/{id}', 'AdminKeywordController@delete')->name('get_admin.keyword.delete')->middleware('permission:keyword_delete|full');
    });
    Route::prefix('menu')->group(function (){
        Route::get('/', 'AdminMenuController@index')->name('get_admin.menu.index')->middleware('permission:menu_index|full');
        Route::get('/create', 'AdminMenuController@create')->name('get_admin.menu.create')->middleware('permission:menu_create|full');
        Route::post('/create', 'AdminMenuController@store');
        Route::get('update/{id}', 'AdminMenuController@edit')->name('get_admin.menu.edit')->middleware('permission:menu_edit|full');
        Route::post('update/{id}', 'AdminMenuController@update');
        Route::get('delete/{id}', 'AdminMenuController@delete')->name('get_admin.menu.delete')->middleware('permission:menu_delete|full');
    });
    Route::prefix('article')->group(function (){
        Route::get('/', 'AdminArticleController@index')->name('get_admin.article.index')->middleware('permission:article_index|full');
        Route::get('/create', 'AdminArticleController@create')->name('get_admin.article.create')->middleware('permission:article_create|full');
        Route::post('/create', 'AdminArticleController@store');
        Route::get('update/{id}', 'AdminArticleController@edit')->name('get_admin.article.edit')->middleware('permission:article_edit|full');
        Route::post('update/{id}', 'AdminArticleController@update');
        Route::get('delete/{id}', 'AdminArticleController@delete')->name('get_admin.article.delete')->middleware('permission:article_delete|full');
    });
});
