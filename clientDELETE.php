<html lang="en">
<head>
  <meta charset="utf-8">
</head>
<body>

<form method="POST" action="clientDELETE.php" >

		Car Make <input type="text" name="make" value="">
		Model <input type="text" name="model" value="">
		Year <input type="text" name="year" value="">
				
	   <input type="submit" value="Delete" >           
  </form>


</body>
</html>
<?php
error_reporting(0);

$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];

$json_data = ["model" => $model, "make" => $make, "year" => $year];

$url = "http://localhost/webservices/serverDELETE.php";

$ch = curl_init($url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($json_data));
 
  $response= curl_exec($ch);
  curl_close($ch);
  $result = json_decode($response);

   if($result->status==201){
    echo"$result->status. Data successfully deleted in the Server DB";
 }else{

    echo $result->status_message;
 }
?>