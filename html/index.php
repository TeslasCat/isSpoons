<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>isSpoons</title>
		<meta name="description" content="The HTML5 Herald">
		<meta name="author" content="SitePoint">
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />
		<!--[if lte IE 8]>
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="css/main.css" />

		<script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
		<script src="js/leaflet.markercluster.js"></script>
	</head>
	<body>
		<div id="map" style="width: 100%; height:100%"></div>
		<script>var map = L.map('map').setView([51.505, -0.09], 13);

			// add an OpenStreetMap tile layer
			L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
			    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
			}).addTo(map);

			var markers = new L.MarkerClusterGroup({ maxClusterRadius: 100});
			map.addLayer(markers);
			// add a marker in the given location, attach some popup content to it and open the popup
<?php
	$file = "/home/flabbyrabbit/git/isSpoons/files/locations.json";
	$data = file_get_contents($file);
	$pubs = json_decode($data);

	foreach ($pubs as $pub) {
		if ($pub->location != null)
			echo "var m = new L.marker([".$pub->location->lat.", ".$pub->location->lng."]).bindPopup('".str_replace("'", "", $pub->name)."');	markers.addLayer(m);\n";
	}
?>
			
		</script>

	</body>
</html>