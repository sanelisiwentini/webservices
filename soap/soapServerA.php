<?php
require_once "nusoap/lib/nusoap.php";

function getProd($name) {

error_reporting(0);
if($_SERVER['REQUEST_METHOD'] == "POST") {
   $data = [];
    $incoming = file_get_contents("php://input");	
    parse_str($incoming, $data);
    $name = filter_var($data["name"]);
    $price = filter_var($data["price"]);




 $servername = "localhost";
    $dbname = "vendora";
    $username = "root";
    $password = "";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
$sql = "select * from products where name ='$name'";
$response = array();
$data= array() ;
$result = $conn->query($sql);
              while($row = mysqli_fetch_array($result))  
                 {
                   $name= $row["Name"];
	    	       $price=$row["Price"] ;
	  	           $data[ ] = array('name'=> $name, 'price'=> $price);
                   }
$response['posts'] = $data;
$fp = fopen('results.json', 'w'); // create a file on hard disk in write mode
fwrite($fp, json_encode($response)); // write array data in json format
fclose($fp); 

//echo $response;





    if($result)// successfuly inserted
    {
      response($data);
    }
	
	else{
      response($result);
    }
	

} else {
    response($result);
}

function response($data)
{
    //header("HTTP/1.1 ".$status);
   
    $response=$data;
    
    $json_response = json_encode($response);
    echo $json_response;
}  
}



$server = new soap_server();
$server->register("getProd");
$server->register("getUser");
//$server->service($HTTP_RAW_POST_DATA);

if ( !isset( $HTTP_RAW_POST_DATA ) ) {
	$HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
}	
$server->service($HTTP_RAW_POST_DATA);

?>