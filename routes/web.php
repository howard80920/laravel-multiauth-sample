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

// shared routes
Route::get('/welcome', 'RootController@welcome');
Route::get('/infos', 'RootController@infos');

// custom route's macro
Route::macro('subdomain', function (string $subdomain, \Closure $definition) {
    $domains = [];
    if ($subdomain === 'localhost') {
        $domains = [ $subdomain ];
    } else {
        $domains = array_map(function ($domain) use ($subdomain) {
            return "$subdomain.$domain";
        }, explode(';', config('site.domains')));
    }
    foreach ($domains as $domain) {
        Route::group([ 'domain' => $domain ], $definition);
    }
});

if (config('site.subdomain.front')) {
    Route::subdomain(config('site.subdomain.front'), function () {
        Route::group([
            'namespace' => 'Front'
        ], function () {
            include base_path('routes/sites/front.php');
        });
    });
}

if (config('site.subdomain.agency')) {
    Route::subdomain(config('site.subdomain.agency'), function () {
        Route::group([
            'namespace'  => 'Agency',
            'middleware' => [ 'guard:agent' ]
        ], function () {
            include base_path('routes/sites/agency.php');
        });
    });
}