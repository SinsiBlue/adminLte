<?php

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
Route::get('/', 'userPostController@index');

Route::get('/admin/accueil', 'PostController@index');
Route::post('/admin/accueil/create', 'PostController@create');
Route::post('/admin/accueil/delete/{id}', 'PostController@destroy');
Route::get('/admin/accueil/edit/{id}', 'PostController@edit');
Route::post('/admin/accueil/update/{id}', 'PostController@update');

Route::get('/admin/bonjour', function () {
    return view('bonjour');
});

Route::get('/admin/salut', function () {
    return view('salut');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
