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

/*require 'admin\page\page_add.php';
require 'admin\page\page_delete.php';
require 'admin\page\page_edit.php';
require 'admin\page\page_index.php';
require 'admin\page\page_save.php';
require 'admin\page\page_show.php';
require 'admin\page\page_update.php';
require 'user\page\page_read.php';*/

Route::get('/', 'User\Page\ReadController@execute');

Auth::routes();

Route::get('/home', 'User\Page\ReadController@execute');

Route::middleware('auth', 'role:ROLE_ADMIN')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'Admin\Page\IndexController@execute');

        Route::get('/add', 'Admin\Page\CreateController@execute');

        Route::get('/show', 'Admin\Page\ReadController@execute');

        Route::post('/save', 'Admin\Page\SaveController@execute');

        Route::patch('/update/{id}', 'Admin\Page\UpdateController@execute');

        Route::get('/edit/{id}', 'Admin\Page\EditController@execute');

        Route::get('/delete/{id}', 'Admin\Page\DeleteController@execute');
    });
});

Route::get('{page}', function ($slug) {
    $page = \App\Page::findBySlug($slug);

    return view('default-page', compact('page'));
});
