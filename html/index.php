<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>isSpoons</title>
		<meta name="description" content="The HTML5 Herald">
		<meta name="author" content="SitePoint">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />
		<!--[if lte IE 8]>
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="css/main.css" />
	</head>
	<body>
		<div id="map" style="width: 100%; height:100%"></div>

		<div class='overlay' id='marker-information'>
			<a class='close' href='#close'>X</a>
			<h1>Title</h1>
			<img width='300px'/>
		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
		<script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
		<script src="js/leaflet.markercluster.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>