<?php

// Route::get('/getCat', function  ()
// {
//     $m = App\Categories::find(1);
//     dd($m->subCategories);
// });

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::view('dashboard', 'admin/dashboard');

    Route::view('medicine/view', 'admin/medicines', ['medicines' => \DB::table('medicines')->paginate(10)])->name('med.view');

    Route::get('medicine/new', 'AdminController@newMed');
    Route::post('medicine/store', 'AdminController@storeMed');

    Route::get('medicine/show/{id}', 'AdminController@showMed')->name('med.show');

    Route::get('medicine/edit/{id}', 'AdminController@editMed');
    Route::post('medicine/update', 'AdminController@updateMed');

    Route::get('medicine/delete/{id}', 'AdminController@deleteMed');

    Route::get('medicine/import', 'AdminController@importNew');
    Route::post('/medicine/import/store', 'AdminController@importExcel');
});

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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
