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

Route::get('/', 'front\homeController@index');
Route::get('/menu/{slug}', 'front\homeController@menu');


Route::group(['middleware'=>'admin'], function(){
Route::prefix('panel')->namespace('admin')->group(function () {

    route::get('/', 'indexController@index');

    route::resource('menu', 'customerController');
    route::resource('image', 'imageController');
    route::get('/menusil/{id}', 'customerController@destroy');
    route::get('/resimsirala','imageController@sirala');



});

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
