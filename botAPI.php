<?php

error_reporting(0);

$msg = $_GET['msg'];


   $data = [];
    $incoming = file_get_contents("php://input");
    parse_str($incoming, $data);
	$msg = filter_var($data["msg"]);


    //Data access
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


	$greetings = array("hello", "hi", "good morning", "good afternoon", "good ay", "good evening", "whats up");
	$prices=array("how much is a car", "how much are the cars", "what is the price of a car");
	$modelprice=array("how much is a");// car", "how much are the cars", "what is the price of a car");
	$contacts=array("what is your phone number", "how do I contact you", "what is your address", "when are you open");
	$thanks=array("thank", "thank you", "thanks");		 
	 
	$results = "";
	
	if (in_array($msg, $greetings)) 
	{
    $results="Greetings, Earthling.";
	}
	
	else if (in_array($msg, $thanks)) 
	{
    $results="You are welcome!";
	}
	else if (in_array($msg, $contacts)) 
	{
    $results = "<tr>
<td>Address: 123 Main St, Old City 12345</td>
<td>Phone: 555-555-1234</td>
<td>Business Hours: Mon-Sat 8am-5pm</td>
</tr>
</br></br>";
	}
	
	else  if (in_array($msg, $prices)) 
	{	
	$sql = "SELECT * FROM cars";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
			$make = $row["make"];
			$model = $row["model"];
			$year = $row["year"]; 
			$price = $row["price"];

$results .= "<tr>
<td>Make: $make</td>
<td>Model: $model</td>
<td>Year: $year</td>
<td>Price: $$price</td>
</tr>
</br></br>";			
			}
		} else 
		{
			echo "0 results found";
		}   
	}
	else  if (in_array($msg, $modelprice)) 
	{	
$model=substr($msg,13 );
	$sql = "SELECT * FROM cars where model='$model'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
			$make = $row["make"];
			$model = $row["model"];
			$year = $row["year"]; 
			$price = $row["price"];

$results .= "<tr>
<td>Make: $make</td>
<td>Model: $model</td>
<td>Year: $year</td>
<td>Price: $$price</td>
</tr>
</br></br>";			
			}
		} else 
		{
			echo "0 results found";
		}   
	}
	 response(201,$results,$msg);
	
function response($status,$status_message,$data)
{
    header("HTTP/1.1 ".$status);
    
    $response['status']=$status;
    $response['status_message']=$status_message;
    $response['data']=$data;
    
    $json_response = json_encode($response);
    echo $json_response;
}

?>