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
		  $songID = test_input($_POST["songID"]);
		  
		  // Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		
		
		$last_id = 0;
		$sql2 = "SELECT * FROM playlist_elements";
		$result = $conn->query($sql2);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		            $last_id = $row["id"];
		    }
		} 
		else {
		    $last_id = 0;
		}
		$last_id++;

		
		$sql = "INSERT INTO playlist_elements VALUES (". $last_id . "," . $_SESSION['playlist'] . "," . $songID . " )";

		  if ($conn->query($sql) === TRUE) {
		    echo "Song Added";
		    $addedStatus=1;
		  } 
		  else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		    $addedStatus=0;
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