
<?php

error_reporting(0);
function getProductA($name)
{
$name = $_GET['name'];
$price = $_GET['price'];

 $json_data = ["name" => $name, "price" => $price];

 $apiURL = "http://localhost/webservices/searchVendorAServer.php";
 $curl = curl_init($apiURL);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // GET method
 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
 curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query($json_data));

 $response = curl_exec($curl);
 curl_close($curl);
 $resultA = $response;

return $response;
}
function getOtherRelatedA($name)
{
	$name = $_GET['name'];
$price = $_GET['price'];

 $json_data = ["name" => $name, "price" => $price];

 $apiURL = "http://localhost/webservices/searchVendorAServer.php";
 $curl = curl_init($apiURL);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // GET method
 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
 curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query($json_data));

 $responseAlt = curl_exec($curl);
 curl_close($curl);
 $resultA = $responseAlt;

return $responseAlt;
	
	
}	
?>
