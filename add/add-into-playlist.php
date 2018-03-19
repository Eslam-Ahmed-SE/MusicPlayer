<?php
session_start();
if(!isset($_SESSION['signedin'])){
	header("location: player.php");
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link href="https://fonts.googleapis.com/css?family=Calligraffitti|Coming+Soon" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="fav.ico"/>

	<script src="../js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<div id="leftTable">
		<table id="viewAddedTable">
		</table>


	</div>

	<div id="rightTable">
		<table id='playlistTable'>
		</table>
	</div>

		<p id="Addinfo">Add More</p>
		<button id="save">Save</button>


	<script src="playlist.js"></script>
</body>
</html>