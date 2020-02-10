<?php 
Route::group(['prefix' => 'user'], function() {
    Route::get('/','UserController@index')->name('user');
    Route::get('edit/{id}','UserController@edit')->name('user_edit');
	Route::post('edit/{id}','UserController@postedit')->name('user_edit');
	Route::get('del/{id}','UserController@delete')->name('user_del');
	Route::get('add','UserController@getadd')->name('user_add');
	Route::post('add','UserController@postadd')->name('user_add');
});



?>