var player = document.getElementById("player"); 
var prev = document.getElementById("previous"); 
var play = document.getElementById("play"); 
var pause = document.getElementById("pause"); 
var next = document.getElementById("next"); 
var slider = document.getElementById("nowPlayingSlider");
var output = document.getElementById("timeStamp");
var volumeSlider = document.getElementById("volumeSlider");
var volume = document.getElementById("volume");
var fullTime = document.getElementById("fullTime");
var remainingOut = document.getElementById("remaining");
var playlistTable = document.getElementById("playlistTable");
var songs = [...Array(6).keys()].map(i => Array(2)); 
songs[0][0] = 'music/t1.mp3';
songs[0][1] = 'Thunder - Imagin Dragons';
songs[1][0] = 'music/t2.mp3';
songs[1][1] = 'Havana - Camilia Cabilo';
songs[2][0] = 'music/t3.mp3';
songs[2][1] = 'I Want You to Know (Ft. Selena Gomez) - Zedd';
songs[3][0] = 'music/t4.mp3';
songs[3][1] = 'Stay - Zedd & Alessia Cara';
songs[4][0] = 'music/t5.mp3';
songs[4][1] = 'Wolves - Selena Gomez & Marshmello';
songs[5][0] = 'music/t6.mp3';
songs[5][1] = 'It Aint Me - Selena Gomez & Kygo';
var indexR = 0;
var indexC = 0;

player.src = songs[indexR][indexC];


function setup() {
	showPlaylist();
	slider.max = player.duration;

	var duration = parseInt(player.duration);
	var durationMin = 0;
	var durationSec = 0;

	if (duration>60){
		durationMin = parseInt(duration/60);
		durationSec = duration-(durationMin*60);
	}
	else {
		durationSec = duration;
	}
	fullTime.innerHTML = " / " + durationMin + ":" + durationSec; // Display the default slider value
}

function showPlaylist(){
	var text, i;

	songsList = songs.length;
	text = /*"<table>"*/ " ";
	for (i = 0; i < songsList; i++) {
		if (i==indexR){
			text += "<tr><td><i class='fas fa-volume-up'></i></td>" + "<td><a class='song' onclick='playWhere(" + i + ")'>" + songs[i][1] + "</a></td></tr>";
		}
	    else {
	    	text += "<tr><td></td>" + "<td><a class='song' onclick='playWhere(" + i + ")'>" + songs[i][1] + "</a></td></tr>";
	    }
	}
	/*text += "</table>";*/
	document.getElementById("playlistTable").innerHTML = text;
}

function playAudio() { 
    player.play(); 
    play.style.display = "none";
    pause.style.display = "initial";
} 

function pauseAudio() { 
    player.pause(); 
    pause.style.display = "none";
    play.style.display = "initial";
}

function playNext(){
	if (indexR<songs.length-1){
		indexR=indexR+1;
		player.src = songs[indexR][0];
		playAudio();
	}
	showPlaylist();
}

function playWhere(x){
	indexR=x;
	player.src = songs[indexR][0];
	playAudio();
	showPlaylist();
}

function playPrevious(){
	if (indexR>0){
		indexR=indexR-1;
		player.src = songs[indexR][0];
		playAudio();
	}
	showPlaylist();
}

//---------time slider------------
output.innerHTML = slider.value; // Display the default slider value

player.ontimeupdate = function() {
	var currTime = parseInt(this.currentTime);
	var currMin = 0;
	var currSec = 0;

	var remaining = parseInt(player.duration) - currTime;
	var remainingMin = 0;
	var remainingSec = 0;

	if(remaining==0){
		playNext();
	}

	if (currTime>60){
		currMin = parseInt(currTime/60);
		currSec = currTime-(currMin*60);
	}
	else {
		currSec = currTime;
	}
	//-----------------------
	if (remaining>60){
		remainingMin = parseInt(remaining/60);
		remainingSec = remaining-(remainingMin*60);
	}
	else {
		remainingSec = remaining;
	}

	output.innerHTML = currMin + ":" + currSec;
	remainingOut.innerHTML = "Remaining: -" + remainingMin + ":" + remainingSec;
	slider.value = currTime;

	//------------
	if (indexR==songs.length-1){
		next.disabled = true;
	}
	else {
		next.disabled = false;
	}

	if (indexR==0){
		previous.disabled = true;
	}
	else{
		previous.disabled = false;
	}

	//-------------------

	slider.max = player.duration;

	var duration = parseInt(player.duration);
	var durationMin = 0;
	var durationSec = 0;

	if (duration>60){
		durationMin = parseInt(duration/60);
		durationSec = duration-(durationMin*60);
	}
	else {
		durationSec = duration;
	}
	fullTime.innerHTML = " / " + durationMin + ":" + durationSec;
}

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
    output.innerHTML = this.value ;
    player.currentTime = this.value;
}
//----------------------------------

//---------volume slider------------
volume.innerHTML = "Volume: " + volumeSlider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
volumeSlider.oninput = function() {
    volume.innerHTML = "Volume: " + this.value;
    player.volume = this.value/100;
}
//----------------------------------



