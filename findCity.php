<?php

$servername = "localhost";
 $dbname = "webservices";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$zip = $_REQUEST['zip']; 

$sql = "SELECT id, name, zip FROM citylist where id='$id' or name='$name' or zip= '$zip' ";

//echo $sql;exit; // debugging 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $id = $row["id"];
         $displayName = $row["name"];
		 $zip = $row["zip"];
        
          echo " ID &nbsp;&nbsp; Name &nbsp;&nbsp; Zip <br>";
          echo " $id &nbsp;&nbsp; $displayName &nbsp;&nbsp; $zip<br>";
    }
} else {
    echo "0 results found";
}

?>
