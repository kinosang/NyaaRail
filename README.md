# NyaaRail
A Railway/Metro Map for Nyaa Minecraft Community

### APIs

#### /api/lines
return array of Lines

```json
[{"id":1,"name":"Line 1","color":"green","created_at":"2016-05-07 15:00:34","updated_at":"2016-05-07 15:00:34"},{"id":2,"name":"Line 2","color":"orange","created_at":"2016-05-07 15:12:34","updated_at":"2016-05-07 15:12:34"}]
```

#### /api/lines/:line_id
return Line Details

```json
{"id":1,"name":"Line 1","color":"green","created_at":"2016-05-07 15:00:34","updated_at":"2016-05-07 15:00:34","stations":[{"id":1,"name":"A1","coordinate":"1,1","created_at":null,"updated_at":null,"pivot":{"line_id":1,"station_id":1}},{"id":2,"name":"A2","coordinate":"2,1","created_at":null,"updated_at":null,"pivot":{"line_id":1,"station_id":2}},{"id":3,"name":"A3","coordinate":"3,2","created_at":null,"updated_at":null,"pivot":{"line_id":1,"station_id":3}},{"id":4,"name":"A4","coordinate":"4,4","created_at":null,"updated_at":null,"pivot":{"line_id":1,"station_id":4}},{"id":5,"name":"A5","coordinate":"4,5","created_at":null,"updated_at":null,"pivot":{"line_id":1,"station_id":5}}]}
```

#### /api/stations
return array of Stations

```json
[{"id":1,"name":"A1","coordinate":"1,1","created_at":null,"updated_at":null},{"id":2,"name":"A2","coordinate":"2,1","created_at":null,"updated_at":null},{"id":3,"name":"A3","coordinate":"3,2","created_at":null,"updated_at":null},{"id":4,"name":"A4","coordinate":"4,4","created_at":null,"updated_at":null},{"id":5,"name":"A5","coordinate":"4,5","created_at":null,"updated_at":null},{"id":6,"name":"B1","coordinate":"1,5","created_at":null,"updated_at":null},{"id":7,"name":"B2","coordinate":"2,3","created_at":null,"updated_at":null},{"id":8,"name":"B3","coordinate":"3,3","created_at":null,"updated_at":null},{"id":9,"name":"B4","coordinate":"5,5","created_at":null,"updated_at":null}]
```

#### /api/link/:station_a_id,:station_a_id
A star search for route

```json
[5,4,8,7,6]
```

#### /api/geojson/lines
GeoJSON-formated Lines Info

```json
{"type":"FeatureCollection","crs":{"type":"name","properties":{"name":"RAIL:LINES"}},"features":[{"type":"Feature","geometry":{"type":"MultiLineString","coordinates":[[["1","1"],["2","1"]],[["2","1"],["3","2"]],[["3","2"],["4","4"]],[["4","4"],["4","5"]]]},"properties":{"name":"Line 1","color":"green"}},{"type":"Feature","geometry":{"type":"MultiLineString","coordinates":[[["1","5"],["2","3"]],[["2","3"],["3","3"]],[["3","3"],["4","4"]],[["4","4"],["4","5"]],[["4","5"],["5","5"]]]},"properties":{"name":"Line 2","color":"orange"}}]}
```

#### /api/geojson/stations
GeoJSON-formated Stations Info

```json
{"type":"FeatureCollection","crs":{"type":"name","properties":{"name":"RAIL:STATIONS"}},"features":[{"type":"Feature","geometry":{"type":"Point","coordinates":["1","1"]},"properties":{"name":"A1"}},{"type":"Feature","geometry":{"type":"Point","coordinates":["2","1"]},"properties":{"name":"A2"}},{"type":"Feature","geometry":{"type":"Point","coordinates":["3","2"]},"properties":{"name":"A3"}},{"type":"Feature","geometry":{"type":"Point","coordinates":["4","4"]},"properties":{"name":"A4"}},{"type":"Feature","geometry":{"type":"Point","coordinates":["4","5"]},"properties":{"name":"A5"}},{"type":"Feature","geometry":{"type":"Point","coordinates":["1","5"]},"properties":{"name":"B1"}},{"type":"Feature","geometry":{"type":"Point","coordinates":["2","3"]},"properties":{"name":"B2"}},{"type":"Feature","geometry":{"type":"Point","coordinates":["3","3"]},"properties":{"name":"B3"}},{"type":"Feature","geometry":{"type":"Point","coordinates":["5","5"]},"properties":{"name":"B4"}}]}
```

#### /api/link/:station_a_id,:station_a_id
GeoJSON-formated Route Info

```json
{"type":"FeatureCollection","crs":{"type":"name","properties":{"name":"RAIL:LINK"}},"features":[{"type":"Feature","geometry":{"type":"MultiLineString","coordinates":[[["4","5"],["4","4"]],[["4","4"],["3","3"]],[["3","3"],["2","3"]],[["2","3"],["1","5"]]]},"properties":{"name":"LINK"}}]}
```
