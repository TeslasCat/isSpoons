$(function() {
	var pubs;
	var map = L.map('map').setView([54.8, -4], 6);	
	// add an OpenStreetMap tile layer
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	var markers = new L.MarkerClusterGroup({ maxClusterRadius: 100});
	map.addLayer(markers);

	$.getJSON("files/locations.json", function(data) {
		pubs = data;
		i = 0;
		$.each(pubs, function(key, pub) {
			if (pub.location != null) {
				var m = new L.marker([pub.location.lat, pub.location.lng]);
				m.on('click', (function(i) { return function(e) { show_popup(i) } }(i)));

				markers.addLayer(m);
			}
			i++;
		});
	});

	$('#marker-information a.close').on('click', function(e) {
		$(this).parent().hide();
	});

	function show_popup(marker) {
		var pub = pubs[marker];

		$('#marker-information img').hide();
		//load data about pub
		$.get("/pub_image.php?q="+pub.name, function(data) {
			$('#marker-information img').attr('src', 'http://www.jdwetherspoon.co.uk/static/gallery/'+data+'-pub-page.jpg').show();
		});

		$('#marker-information h1').text(pub.name);
		$('#marker-information').show();
	}
});