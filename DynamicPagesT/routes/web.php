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

Route::get('/', 'PageController@read');

Auth::routes();

Route::get('/home', 'PageController@read');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/add', 'AdminController@create');

Route::get('/admin/show', 'AdminController@read');

Route::post('/admin/save', 'AdminController@save');

Route::patch('/admin/update/{id}', 'AdminController@update');

Route::get('{page}', function ($slug){
    $page = \App\Page::findBySlug($slug);

    return view('default-page', compact('page'));
});

Route::get('/admin/edit/{id}', 'AdminController@edit');

Route::get('/admin/delete/{id}', 'AdminController@delete');
