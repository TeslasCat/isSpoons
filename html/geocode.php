<?php
	$file = "/home/flabbyrabbit/git/isSpoons/files/locations.json";
	$data = file_get_contents($file);
	$pubs = json_decode($data);
	

	foreach ($pubs as $pub) {
		echo $pub->name . '...';

		$loc = get_location($pub->address);
		$pub->location = $loc;

		echo "<br/>";
	}

	$output = json_encode($pubs);
	file_put_contents($file, $output);

	echo $output;


	function get_location($address) {
		$url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=" . urlencode($address);
		$json = json_decode(file_get_contents($url));

		return $json->results[0]->geometry->location;
	}
?>