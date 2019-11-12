<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
   $data = [];
    $incoming = file_get_contents("php://input");
	
    parse_str($incoming, $data);

    $model = filter_var($data["model"]);
    $price = filter_var($data["price"]);
	$make = filter_var($data["make"]);
	$year = filter_var($data["year"]);


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


    $sql = "insert into cars set price = '$price', make='$make',model='$model',year='$year'";
    //echo $sql; exit; //dubug query
    $result = $conn->query($sql);

    if($result)// successfuly inserted
    {
      response(201,"Product Inserted",$result);
    }else{
      response(400,"Product not inserted",$result);
    }

} else {
    response(400,"Bad Request",$result);
}
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