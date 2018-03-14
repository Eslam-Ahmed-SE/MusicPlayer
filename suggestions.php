<?php 

$search = isset($_GET["search"]) ? $_GET["search"] : null;

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

        $sql = "SELECT * FROM songs WHERE (
                name like '%" . $search . "%' 
                or artist like '%" . $search . "%' 
                or album like '%" . $search . "%');";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["name"] . "'>";
                            echo "<option value='" . $row["artist"] . "'>";
                            echo "<option value='" . $row["album"] . "'>";

                                }
                    } 
                    else {
                        echo "0 results";
                    }
                    $conn->close();
            
            ?>