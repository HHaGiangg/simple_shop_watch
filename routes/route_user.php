<?php

Route::group(['prefix' => 'account', 'namespace'=>'User','middleware' => 'check_user_login'], function (){
    Route::get('','UserDashboardController@dashboard')->name('get.user.dashboard');

    Route::get('update-info','UserInforController@updateInfo')->name('get.user.update_info');
    Route::post('update-info','UserInforController@saveUpdateInfo');

    Route::get('transaction','UserTransactionController@index')->name('get.user.transaction');

    Route::post('ajax-favourite/{idProduct}','UserFavouriteController@addFavourite')->name('ajax_get.user.add_favourite');
    Route::get('favourite','UserFavouriteController@index')->name('get.user.favourite');

});
