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
	

Route::get('/fondend/home',function(){
	return view('fondend.home');

});

Route::group([
	'namespace' => 'backend',
	'middleware' => 'auth',

],function(){

	Route::group([

	],function(){
		Route::resource('product', 'ProductController');
		Route::get('product/showImage/{id}','ProductController@showImages')->name('product.showImage');
		Route::put('check/{product}','ProductController@check')->name('product.check');

	});

	Route::group([
		
	],function(){
		Route::resource('user', 'UserController');
		Route::get('user/showProduct/{id}','UserController@showProduct')->name('user.showProduct');
	});

	Route::group([
		
	],function(){
		Route::resource('category', 'CategoryController');

		Route::get('category/showProduct/{id}', 'CategoryController@showProduct')->name('category.showProduct');
	});

	Route::group([

	],function(){
		Route::resource('collection','CollectionController');
	});

	Route::group([

	],function(){
		Route::resource('trademark','TrademarkController');

	});

	Route::group([

	],function(){
		Route::get('/warehouse','WarehouseController@index')->name('warehouse.index');
		Route::get('/warehouse/{warehouse}','WarehouseController@edit')->name('warehouse.edit');
		Route::put('/warehouse/{warehouse}','WarehouseController@update')->name('warehouse.update');

	});


});
Route::group([
		// 'prefix' => 'order',
		// 'as' => 'order.',
		'namespace' => 'backend',
	],function(){
		Route::get('/order','OrderController@index')->name('order.index');
		Route::post('/order_store','OrderController@store')->name('order.store');
		Route::get('/showProduct/{id}','OrderController@showProduct')->name('order.showProduct');
		Route::get('/complete/{id}','OrderController@complete')->name('order.complete');
		Route::get('/recomplete/{id}','OrderController@recomplete')->name('order.recomplete');
		Route::delete('/order/{id}','OrderController@destroy')->name('order.destroy');

	});


Auth::routes();

// route fontend
Route::get('/', 'HomeController@index')->name('home');
Route::get('/products','HomeController@category')->name('products');

Route::get('/category_product/{id}','HomeController@category')->name('category');
Route::get('/price_category/{id}','HomeController@price_product_category')->name('category.price');

Route::get('/view_sell/{id}','HomeController@viewsell_product_category')->name('category.view_sell');



// collection
Route::get('/Collection','HomeController@all_collection')->name('all_collection');
Route::get('/product_collection/{id}','HomeController@collection')->name('fontend.collection');
Route::get('/price/{id}','HomeController@price_collection')->name('fontend.price_collection');
Route::get('/viewsell/{id}','HomeController@view_sell_collection')->name('fontend.viewsell_collection');


Route::get('/detail_product/{id}','HomeController@detail_product')->name('detail_product');

// trademarrk

Route::get('Trademark','HomeController@all_trademark')->name('Trademark.index');
Route::get('Trademark/{trademark}','HomeController@product_trademark')->name('Trademark.product_trademark');
Route::get('Trademark_price/{trademark}','HomeController@price_trademark')->name('Trademark.price_trademark');
Route::get('Trademark_sell/{trademark}','HomeController@view_sell_trademark')->name('Trademark.view_sell_trademark');


// review

route::group([
	'namespace' => 'fontend',
],function(){
	Route::get('/review', 'ReviewController@index')->name('review.index');
	Route::post('/review_store','ReviewController@store')->name('review.store');
	Route::post('/review_update/{id}','ReviewController@update')->name('review.update');

});

// route giỏ hàng
Route::group([
],function(){
	Route::get('/cart','fontend\CartController@index')->name('cart.index');
	route::get('/cart/{id}', 'fontend\CartController@add')->name('cart.add');
	route::get('/delete/{id}','fontend\CartController@destroy')->name('cart.delete');
	route::post('/aaa','fontend\CartController@store')->name('cart.store');
	Route::get('/plus_qty/{id}', 'fontend\CartController@plus_qty')->name('cart.plus');
	Route::get('/minus_qty/{id}', 'fontend\CartController@minus_qty')->name('cart.minus');


});




