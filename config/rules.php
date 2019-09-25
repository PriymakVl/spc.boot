<?php

return [
	'/' => 'main/index',
	'admin/product' => 'product/product-admin/index',
	'admin/order' => 'order/order-admin/index',
	'admin/category' => 'category/category-admin/index',
	'admin' => 'admin/admin/index',
	'admin/logout' => 'admin/admin/logout',
	'admin/login' => 'admin/admin/login',
	'contacts' => 'main/contacts',
	'sale' => 'main/sale',
	'search' => 'product/product/search',
	'filter' => 'category/category/filter',
	'category/cylinder/form' => 'category/category/cylinder-form',
	'order/save' => 'order/order/save',
	//admin filters
	'admin/filters' => 'filter/filter-admin/index',
	'admin/filter/category' => 'filter/filter-admin/category',
	
	'admin/product/image' => 'product/product-admin/upload-image',
	
	'callback/create' => 'admin/callback-admin/create', 
	'callback/index' => 'admin/callback-admin/index',

	//cart
	'cart' => 'cart/index',
	'cart/add-cylinder' => 'cart/add-cylinder-to-cart',
	'cart/add-product' => 'cart/add-product-to-cart',
	'cart/delete-item' => 'cart/delete-item-cart',

];