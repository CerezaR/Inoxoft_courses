<?php

Route::middleware('auth', 'role:ROLE_ADMIN')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('/save', 'admin\Page\SaveController@execute');
    });
});
