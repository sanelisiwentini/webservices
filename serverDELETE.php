<?php

// REST Server

if($_SERVER['REQUEST_METHOD'] == "DELETE") {
    $data = [];
    $incoming = file_get_contents("php://input");
    parse_str($incoming, $data);

    $model = filter_var($data["model"]);
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

    
    $sql = "delete from cars WHERE model='$model' and make= '$make' and year= '$year'";
    //echo $sql; exit; //dubug query
    $result = $conn->query($sql);

    if($result)// successfuly deleted
    {
      response(200,"Product Delete",$result);
    }else{
      response(400,"Product not updated",$result);
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