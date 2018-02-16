var player = document.getElementById("player"); 
var prev = document.getElementById("previous"); 
var play = document.getElementById("play"); 
var pause = document.getElementById("pause"); 
var next = document.getElementById("next"); 
var slider = document.getElementById("nowPlayingSlider");
var output = document.getElementById("timeStamp");
var volumeSlider = document.getElementById("volumeSlider");
var volume = document.getElementById("volume");

function setup() {
	slider.max = player.duration;
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


//---------time slider------------
output.innerHTML = slider.value; // Display the default slider value

player.ontimeupdate = function() {
	var currTime = parseInt(this.currentTime);
	var currMin = 0;
	var currSec = 0;
	if (currTime>60){
		currMin = parseInt(currTime/60);
		currSec = currTime-(currMin*60);
	}
	else {
		currSec = currTime
	}
	output.innerHTML = currMin + ":" + currSec;
	slider.value = currTime;
}

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
    output.innerHTML = this.value;
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