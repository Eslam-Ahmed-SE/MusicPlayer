<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "player";
session_start();
// define variables and set to empty values
$pass = $email = $respond ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $signedin = 0;
  $pass = test_input($_POST["pass"]);
  $email = test_input($_POST["email"]);
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 



  $sql2 = "SELECT * FROM users where email='" . $email . "' and pass='" . $pass . "';";
  $result = $conn->query($sql2);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
              if($email == $row["email"] && $pass == $row["pass"]){
                $_SESSION["userID"] = $row["userID"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["age"] = $row["age"];
                $_SESSION["sex"] = $row["sex"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["img"] = $row["img"];
                $_SESSION["signedin"] = 1;
                header("Location: index.php");
              }
              else {
                echo "User Name or Email is not correct";
              }
      }
  } 
  else {
      echo "User Name or Email is not correct";
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