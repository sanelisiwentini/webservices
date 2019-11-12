<html lang="en">
<head>
  <meta charset="utf-8">
</head>
<body>

<form method="GET" action="clientPUT.php" >

		Car Make <input type="text" name="make" value="">
		Model <input type="text" name="model" value="">
		Year <input type="text" name="year" value="">
		New Price <input type="text" name="price" value="">
		
	   <input type="submit" value="Insert" >           
  </form>


</body>
</html>


<?php
error_reporting(0);


$carPrice = $_GET['price'];
$carMake = $_GET['make'];
$carModel = $_GET['model'];
$carYear = $_GET['year'];

//$get_string = $_SERVER['QUERY_STRING'];
//$data=parse_str($get_string, $get_array);

 $json_data = ["model" => $carModel, "price" => $carPrice, "make" => $carMake, "year" => $carYear];

 $apiURL = "http://localhost/webservices/serverPUT.php";
 $curl = curl_init($apiURL);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // GET method
 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
 curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query($json_data));

  //echo curl_exec($curl); //exit; //debugging


  $response = curl_exec($curl);
  curl_close($curl);

 $result = json_decode($response);

 if($result->status==200){
    echo"$result->status. Data successfully Updated in the Server DB";
 }else{

    echo $result->status_message;
 }

?>