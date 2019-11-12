<?php
error_reporting(0);
if($_SERVER['REQUEST_METHOD'] == "POST") {
   $data = [];
    $incoming = file_get_contents("php://input");	
    parse_str($incoming, $data);
    $name = filter_var($data["name"]);
    $price = filter_var($data["price"]);




 $servername = "localhost";
    $dbname = "vendorc";
    $username = "root";
    $password = "";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
$sql = "select * from products where name  ='$name' and price <= $price";
$response = array();
$data = array();
$result = $conn->query($sql);
              while($row = mysqli_fetch_array($result))  
                 {
                   $name= $row["Name"];
	    	       $price=$row["Price"] ;
	  	           $description=$row["Description"];
	  	           $data[ ] = array('name'=> $name, 'price'=> $price, 'description'=>$description, 'vendorName'=>"Vendor C");
                   }
$response['posts'] = $data;


    if($result)// successfuly inserted
    {
      response($response);
    }
	
	else{
      response($result);
    }
	

}

else if($_SERVER['REQUEST_METHOD'] == "PUT") {
   $data = [];
    $incoming = file_get_contents("php://input");	
    parse_str($incoming, $data);
    $name = filter_var($data["name"]);
    $price = filter_var($data["price"]);

	$servername = "localhost";
    $dbname = "vendorc";
    $username = "root";
    $password = "";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
$sql = "select * from products where name ='$name' and price > $price";
$response = array();
$data= array() ;
$result = $conn->query($sql);
              while($row = mysqli_fetch_array($result))  
                 {
                   $name= $row["Name"];
	    	       $price=$row["Price"] ;
				   $description=$row["Description"];
	  	           $data[ ] = array('name'=> $name, 'price'=> $price, 'description'=>$description, 'vendorName'=>"Vendor C");
                   }
$response['posts'] = $data;

//echo $response;





    if($result)
    {
      response($response);
    }
	
	else{
      response($result);
    }
	

} 
else 
{
    response($result);
}

function response($data)
{
    //header("HTTP/1.1 ".$status);
   
    $response=$data;
    
    $json_response = json_encode($response);
    echo $json_response;
}
?>
