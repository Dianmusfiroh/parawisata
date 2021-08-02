<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

Route::resource('/visit', 'VisitsController');
// Route::get('/visit/wisata/list', 'conten@wisata_list')->name('wisata_list');
// Route::get('/visit/wisata/show', 'conten@wisata_show')->name('Wisata_show');

Auth::routes([
    'register' => true
]);

Route::get('/home', function () {
    return view('home');
});
// Route::get('/logout', function () {
//     return view('login');
// });

Route::get('/wisata/listalam/{id}', 'WisatasController@listAlam')->name('listAlam');
Route::get('/wisata/listbudaya', 'WisatasController@listBudaya')->name('listBudaya');
Route::get('/wisata/show', 'WisatasController@show')->name('show');
Route::get('/hotel/list', 'HotelsController@list')->name('list');
Route::get('/hotel/item', 'HotelsController@item')->name('item');
Route::get('/hotel/show', 'HotelsController@show')->name('show');
Route::get('/kuliner/list', 'KulinersController@list')->name('list');
Route::get('/kuliner/show', 'KulinersController@show')->name('show');
Route::get('/galery/list', 'GaleriesController@list')->name('list');
Route::get('/galery/show', 'GaleriesController@show')->name('show');
Route::get('/event/list', 'EventsController@list')->name('list');
Route::get('/event/show', 'EventsController@show')->name('show');
Route::get('/visitt/show', 'VisitsController@show')->name('show');
Route::get('/visit','Blog@index');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/api', 'SmsapisController@index');
Route::resource('/hotel', 'HotelsController');
Route::resource('/visitt', 'VisitsController');
Route::resource('/visit', 'VisitsController');
Route::get('/visit/search', 'VisitsController@search');
Route::resource('/contact', 'ContactsController');
Route::resource('/comment', 'CommentsController');
Route::resource('/category', 'CategoriesController');
Route::resource('/event', 'EventsController');
Route::resource('/wisata', 'WisatasController');
Route::resource('/kuliner', 'KulinersController');
Route::resource('/galery', 'GaleriesController');
