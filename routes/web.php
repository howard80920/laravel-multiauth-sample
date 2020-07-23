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

Route::get('/welcome', function () {
    return view('welcome');
});

if (config('app.sites.front_domain')) {
    Route::group([
        'domain'    => config('app.sites.front_domain'),
        'namespace' => 'Front',
    ], function () {
        include base_path('routes/sites/front.php');
    });
}

if (config('app.sites.agency_domain')) {
    Route::group([
        'domain'     => config('app.sites.agency_domain'),
        'namespace'  => 'Agency',
        'middleware' => [ 'guard:agent' ]
    ], function () {
        include base_path('routes/sites/agency.php');
    });
}