<?php 
/*
* GET -> category => method index => danh sach -> name => category.index
* GET -> category/{id} => method -> show -> xem chi tiet
* GET -> category/create => method -> create -> form them moi
* GET -> category/{id}/edit => method -> edit -> form chinh sua
* POST => category/store => thuc hien luu du lieu vao bang db
* PUT => category/update/{id} -> luu du lieu khi update
* DELETE => category/destroy/{id} -> xoa du lieu
*/

Route::resources([
	'category' => 'CategoryController',
	'product' => 'ProductController',
	'newproduct' => 'NewProductController',
	'account' => 'UserController',
	'banner' => 'BannerController',
	'news' => 'NewsController',
	'bill' => 'BillController'
]);

?>