<?php 
	session_start();

	if (!isset($_SESSION['signedin'])){
		echo "<td>".
    		"<a class='playlist' onclick='tableView( 0 )'>" 
    			. "<span id='playlistICO'>all</span>".
    		"</a>" .
    	"</td>
    	<td>
    	<a class='playlist' href='add-playlists.php'>
			<span id='playlistICO'>
				Add
				<i class='fas fa-plus'></i>
			</span>
		</a>
		</td>";
	}
	else {

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
	$sql = "SELECT * FROM playlists where owner=" . $_SESSION["userID"] . ";" ;
	$result = $conn->query($sql);

	echo $sql;

	$i = 1;

	if ($result->num_rows > 0) {
	    // output data of each row
	    echo "<tr>".
	    		"<td>".
	    		"<a class='playlist' onclick='tableView(0)'>" 
	    			. "<span id='playlistICO'>All</span>".
	    		"</a>" .
	    	"</td>";
	    while($row = $result->fetch_assoc()) {
	    	if ($i == 2) {
	    		echo "</tr><tr>";
	    		$i=0;
	    	}
	    	$i = $i +1;
	    	echo 
	    	"<td>".
	    		"<a class='playlist' onclick='tableView(" . $row["playlistID"] . ")'>" 
	    			. "<span id='playlistICO'>". $row["name"] . "</span>".
	    		"</a>" .
	    	"</td>";
	    	
		}
		echo "
		<a class='playlist' href='add-playlists.php'>
			<span id='playlistICO'>
				Add
				<i class='fas fa-plus'></i>
			</span>
		</a>
		</tr>";
	} 
	else {
	    echo "<td>".
	    		"<a class='playlist' onclick='tableView()'>" 
	    			. "<span id='playlistICO'>All</span>".
	    		"</a>" .
	    	"</td>";
	}


	}

?>