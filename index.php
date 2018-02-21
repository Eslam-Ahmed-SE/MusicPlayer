<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="shortcut icon" type="image/x-icon" href="fav.ico"/>
</head>
<body onload="setup()">
	<div class="page">
		<table id="playlistTable"></table>
		
	</div>


	<div class="playingBar">
	  	<audio controls id="player">
			<source src="music/t2.mp3" type="audio/mpeg">
		Your browser does not support the audio element.
		</audio>

		<a href="now-playing.html">
			<img src="http://icons.iconarchive.com/icons/dtafalonso/yosemite-flat/512/Music-icon.png" id="albumArt">
		</a>

	
		<div class="nowPlayingSliderContainer">
			<input type="range" min="0" max="100" value="0" class="nowPlayingSlider" id="nowPlayingSlider">
		</div>

		<div id="times">	
			<div id="timeStamp">timeStamp</div>
			<div id="fullTime">s</div>
			<div id="remaining">Remaining: </div>
		</div>

		<dir id="info">
			<a id="songName">song</a>
			<br>
			<a id="artistName">artist</a>
			&nbsp;&nbsp;
			<a id="dash"> - </a>
			&nbsp;&nbsp;
			<a id="albumName">album</a>
		</dir>

		<div id="controlButtons">
			<a id="previous" onclick="playPrevious()"><i class="fas fa-backward"></i></a>
			&nbsp;&nbsp;
			<a id="play" onclick="playAudio()"><i class="fas fa-play"></i></a>
			<a id="pause" onclick="pauseAudio()"><i class="fas fa-pause"></i></a>
			&nbsp;&nbsp;
			<a id="next" onclick="playNext()"><i class="fas fa-forward"></i></a>
		</div>

		<p id="volume">halaluyaz</p>
		<input type="range" min="0" max="100" value="50" step="1" class="volumeSlider" id="volumeSlider">



	</div>

	




	<script src="js/script.js"></script>
</body>
</html>