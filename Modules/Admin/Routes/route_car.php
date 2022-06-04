<?php
Route::group(['namespace' => 'Car','middleware' => ['permission:group_car|full']], function (){
    Route::prefix('guest')->group(function (){
        Route::get('/', 'AdminGuestController@index')->name('get_admin.guest.index')->middleware('permission:guest_index|full');
        Route::get('delete/{id}', 'AdminGuestController@delete')->name('get_admin.guest.delete')->middleware('permission:guest_delete|full');
    });

    Route::prefix('buses')->group(function (){
        Route::get('/', 'AdminBusesController@index')->name('get_admin.buses.index')->middleware('permission:buses_index|full');
        Route::get('delete/{id}', 'AdminBusesController@delete')->name('get_admin.buses.delete')->middleware('permission:buses_delete|full');
    });

    Route::prefix('ticket')->group(function (){
        Route::get('/', 'AdminTicketController@index')->name('get_admin.ticket.index')->middleware('permission:ticket_index|full');
    });

    Route::prefix('vehicle')->group(function (){
        Route::get('/', 'AdminVehicleController@index')->name('get_admin.vehicle.index')->middleware('permission:vehicle_index|full');
        Route::get('delete/{id}', 'AdminVehicleController@delete')->name('get_admin.vehicle.delete')->middleware('permission:vehicle_delete|full');
    });

    Route::prefix('route')->group(function (){
        Route::get('/', 'AdminRouteController@index')->name('get_admin.route.index')->middleware('permission:route_index|full');
        Route::get('/create', 'AdminRouteController@create')->name('get_admin.route.create')->middleware('permission:route_create|full');
        Route::post('/create', 'AdminRouteController@store');
        Route::get('update/{id}', 'AdminRouteController@edit')->name('get_admin.route.edit')->middleware('permission:route_edit|full');
        Route::post('update/{id}', 'AdminRouteController@update');
        Route::get('delete/{id}', 'AdminRouteController@delete')->name('get_admin.route.delete')->middleware('permission:route_delete|full');
    });
});