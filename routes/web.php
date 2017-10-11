<?php

Route::get('/medicine/new', 'MaatwebsiteExcelController@medNew');
Route::post('/medicine/import', 'MaatwebsiteExcelController@importExcel');


Route::get('/', 'BaseController@index');
Route::get('/view/{cat}/{sub_cat}', 'BaseController@medByCat');

Route::get('/medicine/view/{id}/{name}', 'BaseController@medShow');

// Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
// Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');

// //For whole saler
// Route::get('/ws/medicine', 'WholeSalerController@view');
// Route::get('/ws/medicine/new', 'WholeSalerController@new');
// Route::post('/ws/medicine/new', 'WholeSalerController@store');

// //For retailer in whole saler
// Route::get('/wholesale/medicine', 'BaseController@wsMedViewForRetail');
// Route::post('/wholesale/medicine/moveToStock', 'BaseController@moveToStock');
// //for retailer
// //view all medicine from medicines table
// Route::get('/rt/medicine', 'Retail_marketerController@view');
// //view all company
// Route::get('/company', 'CompaniesController@view');
// Route::get('/company/{id}', 'CompaniesController@show');
//
//
//
// //for customer
// Route::get('/medicine', 'CustomerController@view');
// Route::get('/medicine/watch-list', 'CustomerController@watchList');
// Route::get('/medicine/{id}', 'CustomerController@show');
//
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
