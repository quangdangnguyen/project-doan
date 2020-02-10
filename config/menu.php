<?php 
return [
	[
		'name' => 'DashBoard',
		'icon' => 'fa-home',
		'route' => 'admin'
	],[
		'name' => 'QL. Danh mục',
		'icon' => 'fa-file-word-o',
		'route' => 'category.index',
		'items' => [
			[
				'name' => 'Danh sách',
				'icon' => 'fa-circle-o',
				'route' => 'category.index'
			],
			[
				'name' => 'Thêm mới',
				'icon' => 'fa-circle-o',
				'route' => 'category.create'
			]
		]
	],[
		'name' => 'QL. Sản phẩm',
		'icon' => 'fa-image',
		'route' => 'product.index',
		'items' => [
			[
				'name' => 'Danh sách',
				'icon' => 'fa-circle-o',
				'route' => 'product.index'
			],
			[
				'name' => 'Thêm mới',
				'icon' => 'fa-circle-o',
				'route' => 'product.create'
			]
		]
	],[
		'name' => 'QL. News',
		'icon' => 'fa-image',
		'route' => 'news.index',
		'items' => [
			[
				'name' => 'Danh sách',
				'icon' => 'fa-circle-o',
				'route' => 'news.index'
			],
			[
				'name' => 'Thêm mới',
				'icon' => 'fa-circle-o',
				'route' => 'news.create'
			]
		]
	],
	[
		'name' => 'QL. Banner',
		'icon' => 'fa-image',
		'route' => 'banner.index',
		'items' => [
			[
				'name' => 'Danh sách',
				'icon' => 'fa-circle-o',
				'route' => 'banner.index'
			],
			[
				'name' => 'Thêm mới',
				'icon' => 'fa-circle-o',
				'route' => 'banner.create'
			]
		]
	],
	[
		'name' => 'QL. Bán hàng',
		'icon' => 'fa-image',
		'route' => 'banner.index',
		'items' => [
			[
				'name' => 'Danh sách',
				'icon' => 'fa-circle-o',
				'route' => 'bill.index'
			]
		]
	],
	[
		'name' => 'QL. Admin',
		'icon' => 'fa-user',
		'route' => 'account.index',
		'items' => [
			[
				'name' => 'Danh sách',
				'icon' => 'fa-circle-o',
				'route' => 'account.index'
			],
			[
				'name' => 'Thêm mới',
				'icon' => 'fa-circle-o',
				'route' => 'account.create'
			]
		]
	],
	[
		'name' => 'File Manager',
		'icon' => 'fa-image',
		'route' => 'admin.file'
	]
];
?>