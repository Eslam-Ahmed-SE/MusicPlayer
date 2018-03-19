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
		<div id="newPlaylistContainer">
			<form method='post' id='newPlaylist' autocomplete='off'>
				
				<h1>Playlist name</h1>
				<input id='playlist' type='text' name='playlist' placeholder='Playlist Name' autocomplete='off' required>
				<br>
				<br>
				<br>
				<button id='addPlaylist'>Add</button>
			</form>
		</div>



	<script src="playlist.js"></script>
</body>
</html>