
<?php

error_reporting(0);
function getProductB($name)
{

$name = $_GET['name'];
$price = $_GET['price'];

 $json_data = ["name" => $name, "price" => $price];


 $apiURL = "http://localhost/webservices/searchVendorBServer.php";
 $curl = curl_init($apiURL);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // GET method
 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
 curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query($json_data));

 $response = curl_exec($curl);
 curl_close($curl);

return $response;
/*
 if($result->status==201){
    echo"$result->status. Data successfully Posted in the Server DB";
 }else{

    echo $result->status_message;
 }
 */
}

function getOtherRelatedB($name)
{
	$name = $_GET['name'];
$price = $_GET['price'];

 $json_data = ["name" => $name, "price" => $price];

 $apiURL = "http://localhost/webservices/searchVendorBServer.php";
 $curl = curl_init($apiURL);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // GET method
 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
 curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query($json_data));

 $response = curl_exec($curl);
 curl_close($curl);
 $resultB = $response;

return $response;
	
	
}	
?>
