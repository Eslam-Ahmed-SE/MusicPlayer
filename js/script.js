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
var records = playlistTable.rows.length;
var index = 1 ;
var songName = document.getElementById("songName");
var artistName = document.getElementById("artistName");
var albumName = document.getElementById("albumName");
var albumArt = document.getElementById("albumArt");
var playlistTable = document.getElementById("playlistTable");

var signup = document.getElementById("signup");
var submitSignUp = document.getElementById("submitSignUp");

var body1 = document.getElementById("body1");
var body2 = document.getElementById("body2");
var body3 = document.getElementById("body3");

var signupdiv = document.getElementById("signupdiv");
var signindiv = document.getElementById("signindiv");
var signChoice = document.getElementById("signChoice");

var bodyChanged = 0;

var defaultIMG = 'http://icons.iconarchive.com/icons/dtafalonso/yosemite-flat/512/Music-icon.png';
var search = 0;

function changeBody2(){
	if (bodyChanged == 0) {
		body1.style.display = "none";
		body2.style.display = "initial";
		bodyChanged=1;
	}
}

function changeBody3(){
	if (bodyChanged == 0) {
		body1.style.display = "none";
		body3.style.display = "initial";
		bodyChanged=1;
	}
}

function defaultBody(){
	if (bodyChanged == 1) {
		body2.style.display = "none";
		body3.style.display = "none";
		body1.style.display = "initial";
		bodyChanged=0;
	}
}


$(document).ready(
	tableView()
);

window.addEventListener("keydown", function (event) {
  /*console.log(event.key); for debug
  console.log(event.which); for debug*/
  if (event.which == 177){
  	playPrevious();
  }
  else if (event.which == 176){
  	playNext();
  }
  else if (event.which == 179){
	  if (player.duration > 0 && !player.paused) {
	  	pauseAudio();
	  } 
	  else {
	  	playAudio();
	  }
  }

}, true);



function playedCounter(id)
{
	
 if(id)
 {
  $.ajax({
  type: 'post',
  url: 'playedCounter.php',
  data: {
   song_id:id,
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
 }
	
 else
 {
  $( '#display_info' ).html("Please Enter Some Words");
 }
}




function playlistTableSwitch() {
	if (playlistTable.style.display == "none"){
		playlistTable.style.display = "table";
	}
	else {
		playlistTable.style.display = "none";
	}

}

$("#returnHome").click(function() {

    search =0;

    tableView();

    return false; // avoid to execute the actual submit of the form.
});

function tableView(){

  $.ajax({
  type: 'post',
  url: 'tableView.php',
  data: {},
  success: function (response) {
  	if (search==0){
	   // We get the element having id of display_info and put the response inside it
	   $( '#playlistTable' ).html("<tr><td></td><td>Name</td><td>Played</td></tr>");
	   $( '#playlistTable' ).append(response);
	   $( '#playlistTable' ).append(
               		/*"<tr><td style='color: green; background-color: #f2f2f2;'></td><td style='color: green; background-color: #f2f2f2; text-align: center;' colspan='4' rowspan='2'><a href='add-new.php' style='text-decoration: none;color: green;' > <i class='fas fa-plus-circle'></i> Add new song</a></td><td style='color: green; background-color: #f2f2f2;'></td></tr> <tr><td style='color: green; background-color: #f2f2f2;'></td><td style='color: green; background-color: #f2f2f2;'></td></tr>"*/
               		"<tr><td></td><td rowspan='2'><a href='add-new.php' style='text-decoration: none;' > <i class='fas fa-plus-circle'></i> Add new song</a></td><td></td></tr> <tr><td></td><td></td></tr>"
               	);
	   $( '#ico'+index ).html("<i class='fas fa-volume-up'></i>");
  	}
  }
  });

  /*document.getElementById("ico"+index).innerHTML = "<i class='fas fa-volume-up'></i>";*/
$.ajax({
  type: 'post',
  url: 'suggestions.php',
  data: {},
  success: function (response) {
	   // We get the element having id of display_info and put the response inside it
	   $( '#datalist' ).html(response);
	     }
  });

}


$("#submitButton").click(function() {

    var url = "searchFun.php"; // the script where you handle the form input.
    search =1;

    $.ajax({
           type: "GET",
           url: url,
           data: $("form").serialize(), // serializes the form's elements.
           success: function(data)
           {
           		$( '#playlistTable' ).html("<tr><td></td><td>Name</td><td>Played</td></tr>");
               	$( '#playlistTable' ).append(data); // show response from the php script.
               	$( '#playlistTable' ).append(
               		/*"<tr><td style='color: green; background-color: #f2f2f2;'></td><td style='color: green; background-color: #f2f2f2; text-align: center;' colspan='4' rowspan='2'><a href='add-new.php' style='text-decoration: none;color: green;' > <i class='fas fa-plus-circle'></i> Add new song</a></td><td style='color: green; background-color: #f2f2f2;'></td></tr> <tr><td style='color: green; background-color: #f2f2f2;'></td><td style='color: green; background-color: #f2f2f2;'></td></tr>"*/
               		"<tr><td></td><td rowspan='2'><a href='add-new.php' style='text-decoration: none;' > <i class='fas fa-plus-circle'></i> Add new song</a></td><td></td></tr> <tr><td></td><td></td></tr>"
               	); // show response from the php script.
               	$( '#ico'+index ).html("<i class='fas fa-volume-up'></i>");

               	

           }
         });

    return false; // avoid to execute the actual submit of the form.
});

function showSignUp(){
	signupdiv.style.display = "initial";
	signChoice.style.display = "none";
}

function showSignIn(){
	signindiv.style.display = "initial";
	signChoice.style.display = "none";
}

function showSignOptions(){
	signChoice.style.display = "initial";
	signindiv.style.display = "none";
	signupdiv.style.display = "none";
}

function addUsr(){
	var url = "signup.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("form").serialize(), // serializes the form's elements.
           success: function(data)
           {
               	$( '#respond' ).html(data); // show response from the php script.               	

           }
         });

    return false;
}

function searchChange(){


    var url = "searchFun.php"; // the script where you handle the form input.
    search =1;

    $.ajax({
           type: "GET",
           url: url,
           data: $("form").serialize(), // serializes the form's elements.
           success: function(data)
           {
           		// show response from the php script.
           		$( '#playlistTable' ).html("<tr><td></td><td>Name</td><td>Played</td></tr>");
               	$( '#playlistTable' ).append(data);
               	$( '#playlistTable' ).append(
               		"<tr><td></td><td rowspan='2'><a href='add-new.php' style='text-decoration: none;' > <i class='fas fa-plus-circle'></i> Add new song</a></td><td></td></tr> <tr><td></td><td></td></tr>"
               	);
               	$( '#ico'+index ).html("<i class='fas fa-volume-up'></i>");

               	

           }
         });

    return false; // avoid to execute the actual submit of the form.
}

function setInfo(songN, artistN, albumN, albumA,id){
	songName.innerHTML = songN;
	artistName.innerHTML = artistN;
	albumName.innerHTML = albumN;
	albumArt.src = albumA;

	document.body.style = "position: absolute;top: 0; bottom: 0; left: 0; right: 0;height: 100%;";
	$('head').append("<style> body:before{"+
		"content: '';"+
    "position: fixed;"+
	"background: url('" + albumA +"');"+
	"background-size: cover;"+
    "z-index: -1; /* Keep the background behind the content */"+
    "height: 45%; width: 35%; /* Using Glen Maddern's trick /via @mente */"+
    "/* don't forget to use the prefixes you need */"+
    "transform: scale(5);"+
    "transform-origin: top left;"+
    "filter: blur(5px);"+
    "margin-top: -50%;"+
    "margin-left: -50%;"+

		"}</style>");
	index = id;
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
	if (document.getElementById(index+1) != null){
		document.getElementById(index+1).click();
	}
	else if (index>records){
		document.getElementById(1).click();
	}
	else {
		index+=1;
		playNext();
	}
}

function playThis(link,song,artist,album,albumA,id){
	player.src = link;
	playAudio();
	setInfo(song,artist,album,albumA,id);
	playedCounter(id);
	/*resetIco();*/
	tableView();
	$( '#ico'+index ).html("<i class='fas fa-volume-up'></i>");
	
}

function resetIco(){
	var i = 0;
	while(i<records){
		document.getElementById("playlistTable").rows[i].cells[0].innerHTML = " ";
		i++;
	}
}

function playPrevious(){
	document.getElementById(index-1).click();
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
	remainingOut.innerHTML = "-" + remainingMin + ":" + remainingSec;
	slider.value = currTime;

	//------------
	if (index==records){
		next.disabled = true;
	}
	else {
		next.disabled = false;
	}

	if (index==0){
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

