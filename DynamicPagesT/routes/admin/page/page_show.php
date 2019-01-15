<?php

Route::middleware('auth', 'role:ROLE_ADMIN')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/show', 'admin\Page\ReadController@execute');
    });
});
