<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<!--[if lt IE 9]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]--> 
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="style_footer.css" />
		<link rel="stylesheet" href="style_contact.css" />
        <title>Carnet de Voyage</title>
		<link rel="icon" type="image/png" href="img/system/icon.png" />
		
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEKiwR1Oe5EYuJOWkFSHJxVHb83TdNczY"></script>
		<script type="text/javascript">
			function initialize() {
				var mapOptions = {
					center: { lat: -34.397, lng: 150.644},
					zoom: 8
				};
			var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
   </head>
	
	<body id ="body">
		<div id="main_wrapper">
<?php include("header.php");?>
			
			<div id="map-canvas"></div>
		
<?php include("footer.php");?>
		
		<script src="script_footer.js"></script>
	</body>
</html>