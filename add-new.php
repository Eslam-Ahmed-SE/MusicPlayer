<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="shortcut icon" type="image/x-icon" href="fav.ico"/>
</head>
<body>	







<?php
$last_id = 0;
$id = isset($_POST["id"]) ? $_POST["id"] : null;
$link = isset($_POST["link"]) ? $_POST["link"] : '';
$name = isset($_POST["name"]) ? $_POST["name"] : '';
$artist = isset($_POST["artist"]) ? $_POST["artist"] : '';
$album = isset($_POST["album"]) ? $_POST["album"] : '';
$img = isset($_POST["img"]) ? $_POST["img"] : '';
$played = isset($_POST["played"]) ? $_POST["played"] : 0;


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

/*------------------------------------*/
	/*<!--id | link         | name    | artist         | album  | img                                                              | played -->*/
$sql = "INSERT INTO songs VALUES ($id, '" . $link . "',' " . htmlspecialchars($name, ENT_QUOTES) . "',' " . htmlspecialchars($artist, ENT_QUOTES) . "',' " . htmlspecialchars($album, ENT_QUOTES) . "',' " . $img . "'," . $played . ")";

if ($conn->query($sql) === TRUE) {
    echo "<p style='text-align:center; color:green;'><b> New record created successfully </b></p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


/*------------------------------------*/

$sql2 = "SELECT * FROM songs";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table style='float:left;' id='playlistTable'>";
    while($row = $result->fetch_assoc()) {
        echo 
    		"<tr>".
    			"<td id='ico'>".
    				
    			"</td>".

    			"<td>".
    				$row["id"] . 
    			"</td>".

    			"<td>".
    				$row["link"] . 
    			"</td>".

    			"<td>".
    				$row["name"] . 
    			"</td>".

    			"<td>".
    				$row["artist"] . 
    			"</td>".

    			"<td>".
    				$row["album"] . 
    			"</td>".

    			"<td>".
    				$row["img"] . 
    			"</td>".

    			"<td>".
    				$row["played"] . 
    			"</td>".

    		"</tr>";
    		$last_id = $row["id"];
    }
	echo "</table>";
} 
else {
    echo "0 results";
}

$conn->close();
?>
 

<br>
<br>
<br>

<form method="post">
	<table style="float: left; width: 40%; margin-left: 5%;">
		<tr>
			<td>id:</td>
			<td>
				<input id="id" type="text" name="id" placeholder=<?php echo "' last: " . $last_id . "'"; ?> value=<?php echo $last_id+1; ?> readonly>
			</td>
		</tr>
		
		<tr>
			<td>
				Name: 	
			</td>
			<td>
				<input id="name" type="text" name="name" onchange="infoUpdate();"><br>
			</td>
		</tr>

		<tr>
			<td>
				artist: 
			</td>
			<td>
				<input id="artist" type="text" name="artist" onchange="infoUpdate();"><br>
			</td>
		</tr>

		<tr>
			<td>
				album: 	
			</td>
			<td>
				<input id="album" type="text" name="album" onchange="infoUpdate();"><br>
			</td>
		</tr>

		<tr>
			<td>
				link: 	
			</td>
			<td>
				<input id="link" type="text" name="link" onchange="infoUpdate();"><br>
			</td>
		</tr>

		<tr>
			<td>
				img: 	
			</td>
			<td>
				<input id="img" type="text" name="img" onchange="infoUpdate();"><br>
			</td>
		</tr>

		<tr>
			<td>
				played: 
			</td>
			<td>
				<input id="played" type="number" value="0" name="played" onchange="infoUpdate();" readonly><br>
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<input type="submit">
			</td>
		</tr>		
	</table>
</form>


<div id="pID"></div>

<script type="text/javascript">
        function infoUpdate() {
        	var id = document.getElementById("id").value;
        	var link = document.getElementById("link").value;
        	var name = document.getElementById("name").value;
        	var artist = document.getElementById("artist").value;
        	var album = document.getElementById("album").value;
        	var img = document.getElementById("img").value;
        	var played = document.getElementById("played").value;
        	var pID = document.getElementById("pID");
        	pID.innerHTML = 
        					"<table style='float: left; width:40%; margin-right: 5%; margin-left:0;'>" +
        					"<tr><td colspan='2'> id: " + id + "</td><tr>" +
        					"<tr><td rowspan='2'><img width='75px' src='" + img + "'></td>" +
        					"<td>" + name + "</td></tr>" +
        					"<tr><td>" + artist + " - " + 
        					album + "</td>" + "</tr>" +
        					"<tr><td><audio controls><source src='"+ link +"' type='audio/mpeg'></audio></td>" +
        					"<td>played: " + played + "</td> </tr> </table>" ;
        	/*
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }*/
        }
    </script>

</body>
</html>