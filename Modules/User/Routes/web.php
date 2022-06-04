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

Route::prefix('user')->middleware(['checkLoginUser'])->group(function() {
    Route::get('/', 'UserAccountController@index')->name('get_user.info');
    Route::post('/update-info', 'UserAccountController@updateInfo')->name('get_user.info.update');
    Route::get('transaction', 'UserTransactionController@index')->name('get_user.transaction');
    Route::get('ticket', 'UserTicketController@index')->name('get_user.ticket');
    Route::get('ticket/cancel/{transactionID}', 'UserTicketController@cancelTicket')->name('get_user.ticket.cancel');
    Route::post('ticket/cancel/{transactionID}', 'UserTicketController@processCancelTicket');
    Route::get('ticket/cancel/{transactionID}/preview', 'UserTicketController@cancelTicketPreview')->name('get_user.ticket.cancel_preview');
    Route::get('affiliate', 'UserAffiliateController@index')->name('get_user.affiliate');
    Route::get('friend', 'UserFriendController@index')->name('get_user.friend');
    Route::get('pay-history', 'UserPayHistoryController@index')->name('get_user.pay_history');

    Route::prefix('shopping')->group(function (){
        Route::get('add/{documentID}', 'UserShoppingCartController@add')->name('get_user.shopping.add');
    });
});

Route::prefix('user')->group(function() {
    Route::get('ticket/booking-info', 'UserTicketInfoController@infoBooking')->name('get_user.ticket.info');
});

