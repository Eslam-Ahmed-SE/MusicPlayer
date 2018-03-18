
var playlistTable = document.getElementById("playlistTable");




$(document).ready(
	viewTables()
);

function viewTables(){
	tableView(0);
	viewAddedTable();
}

function viewAddedTable() {
$.ajax({
  type: 'post',
  url: '../tableView.php',
  data: {playlistID:-1,},
  success: function (response) {
	   // We get the element having id of display_info and put the response inside it
	   $( '#viewAddedTable' ).html("<tr><td><a onclick='playlistView()'> <i class='fas fa-arrow-left'></i> </a></td><td>Name</td><td>Played</td></tr>");
	   $( '#viewAddedTable' ).append(response);
	   $( '#viewAddedTable' ).append(
               		/*"<tr><td style='color: green; background-color: #f2f2f2;'></td><td style='color: green; background-color: #f2f2f2; text-align: center;' colspan='4' rowspan='2'><a href='add-new.php' style='text-decoration: none;color: green;' > <i class='fas fa-plus-circle'></i> Add new song</a></td><td style='color: green; background-color: #f2f2f2;'></td></tr> <tr><td style='color: green; background-color: #f2f2f2;'></td><td style='color: green; background-color: #f2f2f2;'></td></tr>"*/
               		"<tr><td></td><td rowspan='2'><a href='add-new.php' style='text-decoration: none;' > <i class='fas fa-plus-circle'></i> Add new song</a></td><td></td></tr> <tr><td></td><td></td></tr>"
               	);
  	
  }
  });
}


function tableView(playlistID){

  $.ajax({
  type: 'post',
  url: 'viewAll.php',
  data: {playlistID:playlistID,},
  success: function (response) {
	   // We get the element having id of display_info and put the response inside it
	   $( '#playlistTable' ).html("<tr><td><a onclick='playlistView()'> <i class='fas fa-arrow-left'></i> </a></td><td>Name</td><td>Played</td></tr>");
	   $( '#playlistTable' ).append(response);
	   $( '#playlistTable' ).append(
               		/*"<tr><td style='color: green; background-color: #f2f2f2;'></td><td style='color: green; background-color: #f2f2f2; text-align: center;' colspan='4' rowspan='2'><a href='add-new.php' style='text-decoration: none;color: green;' > <i class='fas fa-plus-circle'></i> Add new song</a></td><td style='color: green; background-color: #f2f2f2;'></td></tr> <tr><td style='color: green; background-color: #f2f2f2;'></td><td style='color: green; background-color: #f2f2f2;'></td></tr>"*/
               		"<tr><td></td><td rowspan='2'><a href='add-new.php' style='text-decoration: none;' > <i class='fas fa-plus-circle'></i> Add new song</a></td><td></td></tr> <tr><td></td><td></td></tr>"
               	); 
 	  }
  });

 

}


$("#addPlaylist").click(function() {

    var url = "addPL.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("form").serialize(), // serializes the form's elements.
           success: function(data)
           {
           	console.log(data);
           		if (data == "playlist added"){
           			window.location.assign("add-into-playlist.php");
           		}

               	

           }
         });

    return false; // avoid to execute the actual submit of the form.
});




function addSTPL(i) {

    var url = "addSTPL.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: {songID:i ,}, // serializes the form's elements.
           success: function(data)
           {
           	console.log(data);
           		$( '#info' ).html(data);
           		viewAddedTable();

           }
         });
}

$("#save").click(function() {

    window.location.assign("done.php");

    return false; // avoid to execute the actual submit of the form.
});