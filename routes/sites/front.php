<?php

Route::get('/', 'HomesController@welcome');

Route::post('/login', 'LoginController@login');

Route::group([
    'middleware' => [ 'auth' ]
], function () {

    Route::get('/info', 'HomesController@info');

    Route::get('/logout', 'LoginController@logout');
    
});