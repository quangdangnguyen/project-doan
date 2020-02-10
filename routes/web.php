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
//ROUTE USER

Route::get('/', function () {
    return view('welcome');
});


Route::get('index',[
	'as'=>'trang_chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('tin-tuc',[
	'as'=>'tintuc',
	'uses'=>'PageController@getTintuc'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienhe'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'loginuser',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'loginuser',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signinuser',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki',[
	'as'=>'signinuser',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logoutuser',
	'uses'=>'PageController@postLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);

Route::get('thong-tin',[
	'as'=>'user',
	'uses'=>'PageController@getUser'
]);

Route::get('nguoi-dung','PageController@getNguoidung');
Route::post('nguoi-dung','PageController@postNguoidung');


Route::get('send-mail',[
	'as'=>'sendmail',
	'uses'=>'PageController@get_sendmail'
]);

Route::post('send-mail',[
	'as'=>'sendmail',
	'uses'=>'PageController@post_sendmail'
]);


//END ROUTE USER

//ROUTE ADMIN

//Route::get('/', 'HomeController@index')->name('home');
//Route::get('/gioi-thieu', 'HomeController@about')->name('about');

Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware'=>'adminLogin'],function(){

	Route::get('/','AdminController@index')->name('admin');
	Route::get('/logout','AdminController@logout')->name('logout');
	Route::get('/file','AdminController@file')->name('admin.file');
	Route::post('/file','AdminController@upload')->name('admin.file');

	Route::get('/product/unactive/{id}','ProductController@product_unactive');
	Route::get('/product/active/{id}','ProductController@product_active');

	Route::get('/banner/unactive/{id}','BannerController@banner_unactive');
	Route::get('/banner/active/{id}','BannerController@banner_active');

	Route::get('/news/unactive/{id}','NewsController@news_unactive');
	Route::get('/news/active/{id}','NewsController@news_active');

	Route::get('/bill/unactive/{id}','BillController@bill_unactive');
	Route::get('/bill/active/{id}','BillController@bill_active');

	include 'admin.php';

});

Route::get('admin/login', 'Admin\AdminController@login')->name('login');
Route::post('admin/login', 'Admin\AdminController@post_login')->name('login');
//Route::get('/{slug}', 'HomeController@view')->name('view');

// Route::group(['prefix' => 'cart'], function() {
//     Route::get('view','CartController@view')->name('cart.view');
//     Route::get('add/{id}','CartController@add')->name('cart.add');
//     Route::get('remove/{id}','CartController@remove')->name('cart.remove');
//     Route::get('update/{id}','CartController@update')->name('cart.update');
//     Route::get('clear','CartController@clear')->name('cart.clear');
// });





//AND ROUTE ADMIN