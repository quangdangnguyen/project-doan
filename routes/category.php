<?php  
	
	Route::group(['prefix'=>'category'],function(){
		Route::get('/','CategoryController@index')->name('cate');
		Route::get('edit/{id}','CategoryController@edit')->name('cate_edit');
		Route::post('edit/{id}','CategoryController@postedit')->name('cate_edit');
		Route::get('del/{id}','CategoryController@delete')->name('cate_del');
		Route::get('add','CategoryController@getadd')->name('cate_add');
		Route::post('add','CategoryController@postadd')->name('cate_add');

	});

	