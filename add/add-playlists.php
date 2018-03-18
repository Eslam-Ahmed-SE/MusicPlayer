<?php
session_start();
if(!isset($_SESSION['signedin'])){
	header("location: ../player.php");
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
		<form method='post' id='newPlaylist' autocomplete='off'>
			
			Playlist name:
			<input id='playlist' type='text' name='playlist' placeholder='Playlist' autocomplete='off' required></td>
			<button id='addPlaylist'>Add</button>
		</form>
	</div>



	<script src="playlist.js"></script>
</body>
</html>