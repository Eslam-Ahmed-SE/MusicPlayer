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
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link href="https://fonts.googleapis.com/css?family=Calligraffitti|Coming+Soon" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="fav.ico"/>

	<script src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
<div id="body1">
	
	<div class="page">
		<div id="searchBar">
			<form method="get" id="searchForm">
				<button type="button" style="float: left;" id="returnHome"><i class="fas fa-home"></i></button>
				<input id="search" type="text" name="search" placeholder="Search song name, artist or album" autocomplete="off" onkeyup="searchChange();">
				<datalist id="datalist">
				</datalist>
				<button type="button" id="about" onclick='changeBody3()'
							style='	background: #f0f0f0 url( <?php echo "'" . $_SESSION["img"] . "'"; ?>) 0px 0px; 
									background-size: 30px 30px;
									border-radius:50%;'>
				

				</button>
				<button type="button" id="about" onclick="changeBody2()"><i class="fas fa-info-circle"></i></button>
				<button type="submit" id="submitButton"><i class="fas fa-search"></i></button>
			</form>
		</div>	
			<table id='playlistTable'>
			</table>
	</div>

	<div class="playingBar" style="display: initial;">
	  	<audio controls id="player">
			<source src="music/t2.mp3" type="audio/mpeg">
		Your browser does not support the audio element.
		</audio>

		<a>
			<img src="http://icons.iconarchive.com/icons/dtafalonso/yosemite-flat/512/Music-icon.png" id="albumArt">
		</a>		

		<dir id="info">
			<a id="songName">song</a>
			<span id="dash">-</span>
			<a id="artistName">artist</a>
			<br>
			<a id="albumName">album</a>
			<br>
		</dir>

	
		<div id="times">	
			<div id="timeStamp">timeStamp</div>

			<div class="nowPlayingSliderContainer">
				<input type="range" min="0" max="100" value="0" class="nowPlayingSlider" id="nowPlayingSlider">
			</div>
		
			<div id="fullTime">s</div>
			<div id="remaining">Remaining: </div>
		</div>


		<div id="controlButtons">
			<a id="previous" onclick="playPrevious()"><i class="fas fa-backward"></i></a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a id="play" onclick="playAudio()"><i class="fas fa-play"></i></a>
			<a id="pause" onclick="pauseAudio()"><i class="fas fa-pause"></i></a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a id="next" onclick="playNext()"><i class="fas fa-forward"></i></a>
		</div>

		<p id="volume">halaluyaz</p>
		<input type="range" min="0" max="100" value="50" step="1" class="volumeSlider" id="volumeSlider">
	</div>

</div>

	<!-- ******************************************* -->
<div id="body2" style="display: none;">
	<div class="page">
		<div id="searchBar">
			<form method="get" id="searchForm">
				<button type="button" id="about" onclick="defaultBody()"><i class="fas fa-times-circle"></i></button>
			</form>
		</div>	
			
	</div>

	<div id="aboutPage">
		<h1>About</h1>
		<hr>
		<h4>Simple Music Player
		<br>Source Code: <a href="https://github.com/eslam98/MusicPlayer">Github</a></h4>
		<table id="changeLog">
			<tr><th>Change log:</th>	<th></th></tr>
			<tr><td>08032018</td> 		<td>Full Release v1.0</td></tr>
			<tr><td></td>				<td>Redesigned UI</td></tr>
			<tr><td></td>				<td>Added More Functions</td></tr>
			<tr><td>19022018</td>		<td>Initial Release v0.5</td></tr>
		</table>
		<p id="links">
			<a href="http://fb.com/eslam98.2014" target="_blank"> <i class="fab fa-facebook-f"></i>		</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="https://twitter.com/AEslam98" target="_blank"> <i class="fab fa-twitter"></i>			</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="https://www.linkedin.com/in/eslam-a-a640308b/" target="_blank"> <i class="fab fa-linkedin-in"></i>		</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="https://github.com/eslam98/" target="_blank"> <i class="fab fa-github"></i>			</a>
		</p>
		
	</div>
</div>
	
<div id="body3" style="display: none;">
	<div class="page">
		<div id="searchBar">
			<form method="get" id="searchForm">
				<button type="button" id="about" onclick="defaultBody()"><i class="fas fa-times-circle"></i></button>
			</form>
		</div>	
			
	</div>


	<div id="signinup">
			<br>
			<img style="width: 100px; border-radius: 50%;" src=<?php echo "'". $_SESSION["img"] ."'"?> >
			<br>
			<p>
				User name: <?php echo $_SESSION["name"] ?>
			</p>
			<p>
				E-Mail: <?php echo $_SESSION["email"] ?>
			</p>
			<p>
				Age: <?php echo $_SESSION["age"] ?>
			</p>
			<hr>
			<a style='color:white;' href='signout.php'>Sign out</a>
			<br>
			<br>


		
		<span id="respond"></span>
	</div>
</div>



	<script src="js/script.js"></script>
</body>
</html>