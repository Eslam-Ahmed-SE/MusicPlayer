<?php
		session_start();

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "player";

		if (isset($_POST["playlistID"]) && isset($_SESSION['signedin'])){
			$playlistID = test_input($_POST["playlistID"]);
			$sql = "SELECT * FROM playlist_elements INNER JOIN songs ON playlist_elements.songID=songs.id WHERE playlistID=" . $playlistID;
		}
		else $sql = "SELECT * FROM songs;";


		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 



		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo 
		    		"<tr>".
		    			"<td id='ico" . $row["id"] . "'>".
		    				
		    			"</td>".

		    			/*"<td>".
		    				"<a class='song' 
		    					onclick='playThis(\""	
		    						. $row["link"] . "\",\"" 
		    						. $row["name"] . "\",\"" 
		    						. $row["artist"] . "\",\"" 
		    						. $row["album"] . "\",\"" 
		    						. $row["img"] . "\","
		    						. $row["id"] . ")'
		    					id='". $row["id"] . "'>" 
		    					. $row["id"] . 
		    				"</a>" . 
		    			"</td>".

		    			"<td>".
		    				"<a class='song' 
		    					onclick='playThis(\""	
		    						. $row["link"] . "\",\"" 
		    						. $row["name"] . "\",\"" 
		    						. $row["artist"] . "\",\"" 
		    						. $row["album"] . "\",\"" 
		    						. $row["img"] . "\","
		    						. $row["id"] . ")'
		    					id='". $row["id"] . "'>" 
		    					. $row["link"] . 
		    				"</a>" .
		    			"</td>".*/

		    			/*"<td>".
		    				"<a class='song' 
		    					onclick='playThis(\""	
		    						. $row["link"] . "\",\"" 
		    						. $row["name"] . "\",\"" 
		    						. $row["artist"] . "\",\"" 
		    						. $row["album"] . "\",\"" 
		    						. $row["img"] . "\","
		    						. $row["id"] . ")'
		    					id='". $row["id"] . "'>" 
		    					. "<img width='40px' src='" .$row["img"] . "'" . 
		    				"</a>" .
		    			"</td>".*/
		    			
		    			"<td>".
		    				"<a class='song' 
		    					onclick='playThis(\""	
		    						. $row["link"] . "\",\"" 
		    						. $row["name"] . "\",\"" 
		    						. $row["artist"] . "\",\"" 
		    						. $row["album"] . "\",\"" 
		    						. $row["img"] . "\","
		    						. $row["id"] . ")'
		    					id='". $row["id"] . "'>" 
		    					. $row["name"] . 
		    				"</a>" .
		    			"</td>".

		    			/*"<td>".
		    				"<a class='song' 
		    					onclick='playThis(\""	
		    						. $row["link"] . "\",\"" 
		    						. $row["name"] . "\",\"" 
		    						. $row["artist"] . "\",\"" 
		    						. $row["album"] . "\",\"" 
		    						. $row["img"] . "\","
		    						. $row["id"] . ")'
		    					id='". $row["id"] . "'>" 
		    					. $row["artist"] . 
		    				"</a>" .
		    			"</td>".*/

		    			/*"<td>".
		    				"<a class='song' 
		    					onclick='playThis(\""	
		    						. $row["link"] . "\",\"" 
		    						. $row["name"] . "\",\"" 
		    						. $row["artist"] . "\",\"" 
		    						. $row["album"] . "\",\"" 
		    						. $row["img"] . "\","
		    						. $row["id"] . ")'
		    					id='". $row["id"] . "'>" 
		    					. $row["album"] . 
		    				"</a>" .
		    			"</td>".*/


		    			"<td>".
		    				"<a class='song' 
		    					onclick='playThis(\""	
		    						. $row["link"] . "\",\"" 
		    						. $row["name"] . "\",\"" 
		    						. $row["artist"] . "\",\"" 
		    						. $row["album"] . "\",\"" 
		    						. $row["img"] . "\","
		    						. $row["id"] . ")'
		    					id='". $row["id"] . "'>" 
		    					. $row["played"] . 
		    				"</a>" .
		    			"</td>".

		    		"</tr>";
		    }
		} 
		else {
		    echo "0 results";
		}
		$conn->close();


		function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


		?>