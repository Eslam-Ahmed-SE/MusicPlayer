<?php
		session_start();
		if(!isset($_SESSION['signedin'])){
			header("location: player.php");
		}

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "player";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
  		$playlist = test_input($_POST["playlist"]);




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

		$sql = "INSERT INTO playlists VALUES (". $last_id . ",'" . $playlist . "'," . $_SESSION["userID"] . ")";

		  if ($conn->query($sql) === TRUE) {
		    echo "playlist added";
		    $_SESSION["playlist"]=$last_id;
		  } 
		  else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		  }




				$conn->close();
}

		function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


		?>