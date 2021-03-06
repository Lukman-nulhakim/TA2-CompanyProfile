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


//-----------------Route Admin-----------------------
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function(){
            return redirect()->route('home.index');
        });
        Route::resource('home', 'HomeController');
        Route::resource('product', 'ProductController');
        Route::resource('client', 'ClientController');

        // Route::get('contact', 'ContactController@index')->name('contact.index');
        // Route::delete('contact/{contact}', 'ContactController@destroy')->name('contact.destroy');
        Route::resource('contact', 'ContactController');
        Route::resource('detailProduct', 'DetailProductController');
    });
});
        


Route::get('/', 'PagesController@home')->name('home-user');
Route::get('/product', 'PagesController@product')->name('product-user');
Route::get('/client', 'PagesController@client')->name('client-user');
Route::get('/contact', 'PagesController@contact')->name('contact-user');
// route tambahan narto
Route::get('contact/create', 'ContactController@create')->name('contact.create');
Route::post('contact', 'ContactController@store')->name('contactStore');
// Route::get('/', 'PagesController@home')->name('home');
// Route::get('/product', 'PagesController@product')->name('product-user');
// Route::get('/client', 'PagesController@client')->name('client');
// Route::get('/contact', 'PagesController@contact')->name('contact');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
