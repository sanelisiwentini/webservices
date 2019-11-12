
<?php
error_reporting(0);


$carPrice = $_GET['price'];
$carMake = $_GET['make'];
$carModel = $_GET['model'];
$carYear = $_GET['year'];

 $json_data = ["model" => $carModel, "price" => $carPrice, "make" => $carMake, "year" => $carYear];


 $apiURL = "http://localhost/webservices/serverPOST.php";
 $curl = curl_init($apiURL);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // GET method
 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
 curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query($json_data));

 $response = curl_exec($curl);
 curl_close($curl);

 $result = json_decode($response);

 if($result->status==201){
    echo"$result->status. Data successfully Posted in the Server DB";
 }else{

    echo $result->status_message;
 }
?>
