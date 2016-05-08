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

$app->get('/', function () {
    return view('map');
});

$app->get('/api/lines', function () {
    return \App\Line::get();
});

$app->get('/api/lines/{line_id}', function ($line_id) {
    return \App\Line::with('stations')->find($line_id);
});

$app->get('/api/geojson/lines', function () {
    $lines = \App\Line::with('stations')->get();

    $geoArray = [
        'type'     => 'FeatureCollection',
        'crs'      => [
            'type'       => 'name',
            'properties' => [
                'name' => 'RAIL:LINES',
            ],
        ],
        'features' => [],
    ];

    foreach ($lines as $line) {
        $line_coordinates = [];
        foreach ($line->stations as $station_no => $station) {
            if ($station_no >= 0 && $station_no < count($line->stations) - 1) {
                $line_coordinates[] = [
                    explode(',', $station->coordinate),
                    explode(',', $line->stations[$station_no + 1]->coordinate),
                ];
            }
        }

        $geoArray['features'][] = [
            'type'       => 'Feature',
            'geometry'   => [
                'type'        => 'MultiLineString',
                'coordinates' => $line_coordinates,
            ],
            'properties' => [
                'name' => $line->name,
            ],
        ];
    }

    return $geoArray;
});

$app->get('/api/stations', function () {
    return \App\Station::get();
});

$app->get('/api/geojson/stations', function () {
    $stations = \App\Station::get();

    $geoArray = [
        'type'     => 'FeatureCollection',
        'crs'      => [
            'type'       => 'name',
            'properties' => [
                'name' => 'RAIL:STATIONS',
            ],
        ],
        'features' => [],
    ];

    foreach ($stations as $station) {
        list($axis_x, $axis_y)  = explode(',', $station->coordinate);
        $geoArray['features'][] = [
            'type'       => 'Feature',
            'geometry'   => [
                'type'        => 'Point',
                "coordinates" => [$axis_x, $axis_y],
            ],
            "properties" => [
                "name" => $station->name,
            ],
        ];
    }

    return $geoArray;
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
