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


Route::group(['namespace' => 'Auth','prefix' => 'auth'], function (){
    Route::get('login','AdminLoginController@login')->name('get_admin.login');
    Route::post('login','AdminLoginController@postLogin');

    Route::get('logout','AdminLoginController@logout')->name('get_admin.logout');
});
Route::prefix('admin')->middleware('checkLoginAdmin')->group(function() {
    Route::get('/', 'AdminDashboardController@index')->name('get_admin.dashboard')->middleware('permission:dashboard|full');

    Route::prefix('tag')->group(function (){
        Route::get('/', 'AdminTagController@index')->name('get_admin.tag.index')->middleware('permission:tag_index|full');
        Route::get('/create', 'AdminTagController@create')->name('get_admin.tag.create')->middleware('permission:tag_create|full');
        Route::post('/create', 'AdminTagController@store');
        Route::get('update/{id}', 'AdminTagController@edit')->name('get_admin.tag.edit')->middleware('permission:tag_edit|full');
        Route::post('update/{id}', 'AdminTagController@update');
        Route::get('delete/{id}', 'AdminTagController@delete')->name('get_admin.tag.delete')->middleware('permission:tag_delete|full');
    });

    Route::prefix('doctor')->group(function (){
        Route::get('/', 'AdminDoctorController@index')->name('get_admin.doctor.index')->middleware('permission:doctor_index|full');
        Route::get('/create', 'AdminDoctorController@create')->name('get_admin.doctor.create')->middleware('permission:doctor_create|full');
        Route::post('/create', 'AdminDoctorController@store');
        Route::get('update/{id}', 'AdminDoctorController@edit')->name('get_admin.doctor.edit')->middleware('permission:doctor_edit|full');
        Route::post('update/{id}', 'AdminDoctorController@update');
        Route::get('delete/{id}', 'AdminDoctorController@delete')->name('get_admin.doctor.delete')->middleware('permission:doctor_delete|full');
    });

    Route::prefix('category')->group(function (){
        Route::get('/', 'AdminCategoryController@index')->name('get_admin.category.index')->middleware('permission:category_index|full');
        Route::get('/create', 'AdminCategoryController@create')->name('get_admin.category.create')->middleware('permission:category_create|full');
        Route::post('/create', 'AdminCategoryController@store');
        Route::get('update/{id}', 'AdminCategoryController@edit')->name('get_admin.category.edit')->middleware('permission:category_edit|full');
        Route::post('update/{id}', 'AdminCategoryController@update');
        Route::get('delete/{id}', 'AdminCategoryController@delete')->name('get_admin.category.delete')->middleware('permission:category_delete|full');
    });


    Route::prefix('slide')->group(function (){
        Route::get('/', 'AdminSlideController@index')->name('get_admin.slide.index')->middleware('permission:slide_index|full');
        Route::get('/create', 'AdminSlideController@create')->name('get_admin.slide.create')->middleware('permission:slide_create|full');
        Route::post('/create', 'AdminSlideController@store');
        Route::get('update/{id}', 'AdminSlideController@edit')->name('get_admin.slide.edit')->middleware('permission:slide_edit|full');
        Route::post('update/{id}', 'AdminSlideController@update');
        Route::get('delete/{id}', 'AdminSlideController@delete')->name('get_admin.slide.delete')->middleware('permission:slide_delete|full');
    });

    Route::prefix('page')->group(function (){
        Route::get('/', 'AdminPageController@index')->name('get_admin.page.index')->middleware('permission:page_index|full');
        Route::get('/create', 'AdminPageController@create')->name('get_admin.page.create')->middleware('permission:page_create|full');
        Route::post('/create', 'AdminPageController@store');
        Route::get('update/{id}', 'AdminPageController@edit')->name('get_admin.page.edit')->middleware('permission:page_edit|full');
        Route::post('update/{id}', 'AdminPageController@update');
        Route::get('delete/{id}', 'AdminPageController@delete')->name('get_admin.page.delete')->middleware('permission:page_delete|full');
    });

    Route::prefix('configuration')->group(function (){
        Route::get('/', 'AdminConfigurationController@index')->name('get_admin.configuration.index')
            ->middleware('permission:configuration_index|full');
        Route::post('/', 'AdminConfigurationController@store')->middleware('permission:configuration_edit|full');
    });

    Route::prefix('ajax')->namespace('Ajax')->group(function (){
        Route::post('/upload/image', 'AdminAjaxUploadImageController@processUpload')->name('post_ajax_admin.uploads');
    });

    Route::prefix('user')->group(function (){
        Route::get('/', 'AdminUserController@index')->name('get_admin.user.index')->middleware('permission:user_index|full');
//        Route::get('/create', 'AdminUserController@create')->name('get_admin.user.create')->middleware('permission:user_create|full');
//        Route::post('/create', 'AdminUserController@store');
        Route::get('update/{id}', 'AdminUserController@edit')->name('get_admin.user.edit')->middleware('permission:user_edit|full');
        Route::post('update/{id}', 'AdminUserController@update');
        Route::get('delete/{id}', 'AdminUserController@delete')->name('get_admin.user.delete')->middleware('permission:user_delete|full');
    });

    require_once 'route_acl.php';
    require_once 'route_blog.php';
    require_once 'route_cart.php';
    require_once 'route_car.php';
    require_once 'route_ecommerce.php';
    require_once 'route_system.php';
});
