<?php
	$q = $_GET['q'];


	//load cached locations
	$cache = file_get_contents("files/cache.json");
	$cache = json_decode($cache);
	
	foreach($cache as $query) {
		if ($query->query == $q) {
			echo $query->cover_id;
			die();
		}
	}


	$url = 'http://www.jdwetherspoon.co.uk/home/ajax/layout_find_pubs?_frameset=true';
	$ch = curl_init($url);

	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, array('search_term' => $q, 'by' => ''));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($ch);
	curl_close($ch);

	$pubs = json_decode($response);

	$pubs = $pubs->pubs;
	foreach($pubs as $place) {
		foreach($place as $pub) {
			$cover_id = $pub->cover_image_id;
			break;
		}
		break;
	}


	$cache[$q] = array("query"=>$q, "cover_id"=>$cover_id);

	$cache = json_encode(array_values($cache));
	file_put_contents("files/cache.json", $cache);


	echo $cover_id;
?>