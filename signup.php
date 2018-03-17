<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "player";

// define variables and set to empty values
$user = $pass = $email = $age = $sex = $img = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = test_input($_POST["user"]);
  $pass = test_input($_POST["pass"]);
  $email = test_input($_POST["email"]);
  $age = test_input($_POST["age"]);
  $sex = test_input($_POST["sex"]);
  $img = test_input($_POST["img"]);



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$last_id = 0;
$exists = 0;


$sql2 = "SELECT * FROM users";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $last_id = $row["userID"];
            if($email == $row["email"]){
              $exists =1;
            }
    }
} 
else {
    $last_id = 0;
}
$last_id++;
$addedStatus=0;




if ($exists == 1) {
  echo "Error: E-Mail already exists";
}


else {
  $sql = "INSERT INTO users VALUES (". $last_id . ",'" . $user . "'," . $age . ", '" . $sex . "', '" . $email . "', '" . $img . "', '" . $pass . "' )";

  if ($conn->query($sql) === TRUE) {
    echo "New user added successfully";
    $addedStatus=1;
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $addedStatus=0;
  }
}






if ($addedStatus==1){
  $sql = "SELECT * FROM playlists";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $last_playlist_id = $row["playlistID"];
    }
  } 
  else {
      $last_playlist_id = 0;
  }
  $last_playlist_id++;




$sql = "INSERT INTO playlists VALUES (". $last_playlist_id . ",'All'," . $last_id . ")";

  if ($conn->query($sql) === TRUE) {
    echo "+ playlist All";
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


$songsArr = array();

$sql = "SELECT id FROM songs";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            array_push($songsArr,$row["id"]);
    }
  } 




$last_playlist_elements_id =0;

$sql = "SELECT * FROM playlist_elements";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $last_playlist_elements_id = $row["id"];
    }
  } 
  else {
      $last_playlist_elements_id = 0;
  }
  

$last_playlist_elements_id++;
$arrlength = count($songsArr);
$AllSongsDone = 0;

  for($x = 0; $x < $arrlength; $x++) {
    
  $sql = "INSERT INTO playlist_elements values(" . $last_playlist_elements_id . "," . $last_playlist_id . "," . $songsArr[$x] . ")" ;
  if ($conn->query($sql) === TRUE) {
    $AllSongsDone =1;
  } 
  else {
    echo "<br>Error: " . $sql . "<br>" . $conn->error;
  }
  $last_playlist_elements_id++;

    
}



if ($AllSongsDone == 1) {
  echo " + All songs inside All";
}



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