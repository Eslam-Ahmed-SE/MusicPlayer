<?php
		session_start();
		if(!isset($_SESSION['signedin'])){
			header("location: player.php");
		}

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
		
		$last_id = 0;
		$sql2 = "SELECT * FROM playlists";
		$result = $conn->query($sql2);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		            $last_id = $row["playlistID"];
		    }
		} 
		else {
		    $last_id = 0;
		}
		$last_id++;

		


		$sql = "SELECT * FROM songs;";




		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo 

		        	
					
		    		"<tr>".
		    			"<td id='ico" . $row["id"] . "'>".

		    				"
													
							<button id='addSongToPL' onclick='addSTPL(" . $row['id'] . ")' style='display:initial;'>+</button>
							".
		    			"</td>".
		    			
		    			"<td>".
		    				"<a class='song' 
		    					onclick='addSTPL(" . $row['id'] . ")'>" 
		    					. $row["name"] . 
		    				"</a>" .
		    			"</td>".

		    			"<td>".
		    				"<a class='song' 
		    					onclick='addSTPL(" . $row['id'] . ")'
		    					id='". $row["id"] . "'>" 
		    					. $row["played"] . 
		    				"</a>" .
		    			"</td>".

		    		"</tr>";
		    }
		} 
		else {
		    echo "<tr> <td></td><td>0 results</td><td></td>";
		}
		$conn->close();


		function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


		?>