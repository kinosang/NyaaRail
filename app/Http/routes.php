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

$app->get('/api/link/{station_id_start},{station_id_goal}', function ($station_id_start, $station_id_goal) {
    $start = new \App\SNode($station_id_start);
    $goal  = new \App\SNode($station_id_goal);

    $aStar = new \App\RAStar();

    $solution = $aStar->run($start, $goal);

    if ($solution) {
        $nodes = [];

        foreach ($solution as $node) {
            $nodes[] = $node->getID();
        }

        return $nodes;
    } else {
        return ['error' => '404'];
    }
});
