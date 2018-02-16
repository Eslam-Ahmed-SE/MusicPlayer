var player = document.getElementById("player"); 
var prev = document.getElementById("previous"); 
var play = document.getElementById("play"); 
var pause = document.getElementById("pause"); 
var next = document.getElementById("next"); 
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");

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