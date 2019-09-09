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
$category = $_REQUEST['category']; // or you can use this $category  = $_POST['category'];

$sql = "SELECT id, name, category FROM products where id='$id' or name='$name' or category= '$category' ";

//echo $sql;exit; // debugging 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $id = $row["id"];
         $displayName = $row["name"];
		 $category = $row["category"];
        
          echo " ID &nbsp;&nbsp; Name &nbsp;&nbsp; Category <br>";
          echo " $id &nbsp;&nbsp; $displayName &nbsp;&nbsp; $category<br>";
    }
} else {
    echo "0 results found";
}

?>
