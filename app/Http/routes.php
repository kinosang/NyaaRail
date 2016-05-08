<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/api/lines', function () {
    return \App\Line::get();
});

$app->get('/api/lines/{line_id}', function ($line_id) {
    return \App\Line::with('stations')->find($line_id);
});

$app->get('/api/stations', function () {
    return \App\Station::get();
});
