<?php

Route::middleware('auth', 'role:ROLE_ADMIN')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::patch('/update/{id}', 'admin\Page\UpdateController@execute');
    });
});
