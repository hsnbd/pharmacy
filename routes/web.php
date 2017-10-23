<?php

Route::get('/medicine/new', 'MaatwebsiteExcelController@medNew');

Route::post('/medicine/import', 'MaatwebsiteExcelController@importExcel');


Route::get('/', 'BaseController@index');

Route::post('/livesearch', 'BaseController@liveSearch')->name('live.search');

Route::get('/search/{search?}', 'BaseController@searchResult')->name('search')->where('search', '(.*)');

Route::get('/view/{cat}/{sub_cat}', 'BaseController@medByCat');

Route::get('/medicine/view/{id}/{name}', 'BaseController@medShow');

Route::post('/add-cart', 'CartController@addCart');

Route::get('/cart', 'CartController@view');

Route::get('/checkout', 'CartController@checkout');

Route::post('/add-full-cart', 'CartController@addFullCart');

Route::post('/get-address', 'CartController@getAddress');

Route::get('/congratulation', 'CartController@congratulation');


Route::get('/script', function() { return view('script'); });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
