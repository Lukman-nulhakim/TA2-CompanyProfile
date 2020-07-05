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
//     return view('admin.master');
// });
//

//-----------------Route Admin-----------------------
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function(){
            return redirect()->route('home.index');
        });
        Route::resource('home', 'HomeController');
        Route::resource('product', 'ProductController');
        Route::resource('client', 'ClientController');
        Route::resource('contact', 'ContactController');
    });
});


Route::get('/', 'PagesController@home')->name('home');
Route::get('/product', 'PagesController@product')->name('product');
Route::get('/client', 'PagesController@client')->name('client');
Route::get('/contact', 'PagesController@contact')->name('contact');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
