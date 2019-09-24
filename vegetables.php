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

$sql = "SELECT * FROM vegetables";

//echo $sql;exit; // debugging 
$result = $conn->query($sql);

$dbdata = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $dbdata[]=$row;
		 echo $row["name"]."<br/>";
		 echo $row["type"]."<br/>";
		 echo $row["price"]."<br/>";
		 echo "<hr>";
		 }
} else {
    echo "0 results found";
}

$fp = fopen('vegetables.json', 'w'); // create a file on hard disk in write mode
fwrite($fp, json_encode($dbdata)); // write array data in json format
fclose($fp); 
//echo json_encode($dbdata);
//file_put_contents('vegetables.json', json_encode($dbdata));

?>
