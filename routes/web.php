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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){

	return view('backend.index');
});

// Route::group(
// 	[
// 		'prefix'=>'user',
// 		'as' => 'user.'
// 	],function(){
// 		Route::get('/index',function(){
// 			return view('backend.user.list');	
// 		})->name('index');
// 		Route::get('/create',function(){
// 			return view ('backend.user.create');
// 		})->name('create');
// 		Route::get('/edit/{id}',function($id){
// 			return view ('backend.user.edit',['id'=>$id]);
// 		})->name('edit');
// 		Route::get('/show/{id}',function($id){
// 			return view('backend.user.detail',['id'=>$id]);
// 		})->name('show');
// 		Route::delete('{id}',function($id){
// 			dd('$id');
// 		})->name('destroy');
// 		Route::put('{id}',function(){
			
// 		});
// });

	


Route::get('/fondend/home',function(){
	return view('fondend.home');

});

Route::group([
	'namespace' => 'backend',

],function(){
	Route::group([

	],function(){
		Route::resource('product', 'ProductController');
		Route::get('product/showImage/{id}','ProductController@showImages')->name('product.showImage');
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
		'prefix' => 'order',
		'as' => 'order.',
	],function(){
		Route::get('/','OrderController@index')->name('index');
		Route::get('/showProduct/{id}','OrderController@showProduct')->name('showProduct');

	});

});