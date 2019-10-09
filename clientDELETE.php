
<?php


$model = $_POST['model'];
$url = "http://localhost/webservices/serverDELETE.php?model=".$model;

$ch = curl_init($url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer MY_API_TOKEN'));

  $response= curl_exec($ch);
  $result = json_decode($response);

  if($result->status==200){
    echo"$result->status. Data successfully Deleted from the Server DB";
  }else{

    echo $result->status_message;
  }
?>