<?php
if( isset( $_POST['song_id'] ) )
{

	$id = $_POST['song_id'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "player";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "UPDATE songs SET played = played+1 WHERE id=". $id .";";
	
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	$conn->close();
}
?>