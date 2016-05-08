<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ol.css" type="text/css">
    <style>
    .map {
        height: 100%;
        width: 100%;
    }
    </style>
    <title>Nyaa Rail Map</title>
</head>
<body>
    <div id="map" class="map"></div>
    <script src="ol.js" type="text/javascript"></script>
    <script>
    function lineStyleFunction(feature, resolution) {
        return new ol.style.Style({
            stroke: new ol.style.Stroke({
                color: feature.get('color'),
                width: 5
            }),
            text: new ol.style.Text({
                textAlign: 'center',
                textBaseline: 'middle',
                font: 'Courier New',
                text: feature.get('name'),
                fill: new ol.style.Fill({color: feature.get('color')}),
                stroke: new ol.style.Stroke({color: '#ffffff', width: 3}),
                offsetX: 0,
                offsetY: 0,
                rotation: 0
            })
        });
    }

    var vectorLines = new ol.layer.Vector({
        source: new ol.source.Vector({
            url: '/api/geojson/lines',
            format: new ol.format.GeoJSON({
                defaultDataProjection :'RAIL:LINES',
                projection: 'RAIL:LINES'
            })
        }),
        style: lineStyleFunction
    });


    function pointStyleFunction(feature, resolution) {
        return new ol.style.Style({
            image: new ol.style.Circle({
                radius: 5,
                fill: null,
                stroke: new ol.style.Stroke({color: 'red', width: 5})
            }),
            text: new ol.style.Text({
                textAlign: 'center',
                textBaseline: 'middle',
                font: 'Arial',
                text: feature.get('name'),
                fill: new ol.style.Fill({color: '#aa3300'}),
                stroke: new ol.style.Stroke({color: '#ffffff', width: 3}),
                offsetX: 0,
                offsetY: 0,
                rotation: 0
            })
        });
    }

    var vectorPoints = new ol.layer.Vector({
        source: new ol.source.Vector({
            url: '/api/geojson/stations',
            format: new ol.format.GeoJSON({
                defaultDataProjection :'RAIL:STATIONS',
                projection: 'RAIL:STATIONS'
            })
        }),
        style: pointStyleFunction
    });

    var map = new ol.Map({
        layers: [
            new ol.layer.Tile({
                source: new ol.source.MapQuest({layer: 'osm'})
            }),
            vectorLines,
            vectorPoints
        ],
        target: 'map',
        view: new ol.View({
            center: [0, 0],
            zoom: 8
        })
    });
    </script>
</body>
</html>
