<?php

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

//Route::get('bai-viet.html', 'BlogHomeController@index')->name('get_blog.index');
Route::prefix('bai-viet')->group(function() {
    Route::get('/{slug}', 'BlogHubController@renderBlog')->name('get_blog.render');
});
