<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'account' ,'namespace' => 'Auth'], function (){
    Route::get('login', 'LoginController@index')->name('get.login');
    Route::post('login', 'LoginController@postLogin')->name('get.login');

    Route::get('register', 'RegisterController@index')->name('get.register');
    Route::post('register', 'RegisterController@postRegister');

    Route::get('logout','LoginController@getLogout')->name('get.logout');
    Route::get('social/{drive}','SocialAuthController@redirect')->name('get.login_social');
    Route::get('/{social}/callback', 'SocialAuthController@callback')->name('get.login.social_callback');
});

Route::middleware('checkUpdatePhone')->group(function() {
    Route::get('', 'HomeController@index')->name('get.home');
    Route::get('trang-chu', 'HomeController@index')->name('get.home');
    Route::get('search', 'SearchController@index')->name('get.search');
    Route::get('bac-sy-{slug}-{id}', 'DoctorProfileController@index')
        ->name('get.doctor.detail')
        ->where(['slug' => '[a-z-]+', 'id' => '[0-9]+',]);

    Route::get('bac-sy-{slug}-{id}/book', 'DoctorProfileController@book')
        ->name('get.doctor.book')
        ->where(['slug' => '[a-z-]+', 'id' => '[0-9]+',]);

    Route::post('bac-sy-{slug}-{id}/book', 'DoctorProfileController@store')
        ->name('get.doctor.book')
        ->where(['slug' => '[a-z-]+', 'id' => '[0-9]+',]);

    Route::get('tim-kiem-bs.html', 'SearchController@index')
        ->name('get.doctor.search');

    Route::get('bai-viet/{slug}-{id}', 'ArticleController@index')
        ->name('get.article.detail')
        ->where(['slug' => '[a-z-]+', 'id' => '[0-9]+',]);

    Route::get('bai-viet.html', 'MenuController@getLists')->name('get_blog.index');

    // Menu bài viết
    Route::get('m-{slug}-{id}.html','MenuController@index')
        ->name('get.menu')
        ->where(['slug' => '[a-z-]+', 'id' => '[0-9]+',]);

    // Menu bài viết
    Route::get('bai-viet-tim-kiem.html','MenuController@search')
        ->name('get.article.search');

    Route::post('vote/{doctor_id}', 'VoteController@store')->name('get_user.vote');

});



Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
