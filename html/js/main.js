$(function() {
	var map = L.map('map').setView([54.8, -4], 6);	
	// add an OpenStreetMap tile layer
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	var markers = new L.MarkerClusterGroup({ maxClusterRadius: 100});
	map.addLayer(markers);

	$.getJSON("files/locations.json", function(data) {
			$.each(data, function(key, pub) {
				if (pub.location != null) {
					var m = new L.marker([pub.location.lat, pub.location.lng]).bindPopup(pub.name);
					markers.addLayer(m);
				}
			})
	});

	map.on('moveend', function(e) {
		console.log(e);
	});
});