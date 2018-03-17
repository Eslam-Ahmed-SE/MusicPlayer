<?php 
	session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "player";

	$playlists = array(
		array("All",1)
	);

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql0 = "SELECT * FROM playlists where owner='" . $_SESSION["userID"] . "';" ;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    unset($playlists); // $foo is gone
		$playlists = array(); // $foo is here again
	    while($row = $result->fetch_assoc()) {
	    	int i=0;
	    	$playlists[0][i] = $row["playlistID"];
	    	$playlists[1][i] = $row["name"];
	    	echo 
	    	"<tr>".
	    	"<td>".
	    		"<img src'' alt='". $row["name"] . "'>".
	    	"</td>".
	    	"<td>".
				"<a class='playlist' 
					onclick='tableViewThis(" . $row["playlistID"] 
					. ",\"" . $row["name"] . "\",)' id='". $row["playlistID"] . "'>" 
					. $row["name"] . 
				"</a>" .
			"</td>".
			"</tr>";
	    	
		}
	} 
	else {
	    echo "0 results";
	}




?>