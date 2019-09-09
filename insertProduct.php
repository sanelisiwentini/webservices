<?php
$servername = "localhost"; $dbname = "webservices";
$username = "root"; // default username to connect to DB is root
$password = ""; // default password to connect to DB is empty, or you can also use root as password also. I am using empty password in my PC.

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Capture data sent from index.php
$name = $_GET['name']; // get data sent from previous html form on index.php
$category = $_GET['category'];             // get data sent from previous html form on index.php

$sql = "INSERT INTO products (name, category)
VALUES ('$name', '$category')"; // notice single quotes around variables because data is string. For integer or numbers we will not use single quotes.

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";	
	header("location:main.php?name=$name");
} else {
    echo "Error: record couldn’t be inserted";
}
$conn->close(); // close DB connection 
?>

