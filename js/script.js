var player = document.getElementById("player"); 
var prev = document.getElementById("previous"); 
var play = document.getElementById("play"); 
var pause = document.getElementById("pause"); 
var next = document.getElementById("next"); 

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