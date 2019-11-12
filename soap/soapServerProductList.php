<?php
require_once "nusoap/lib/nusoap.php";

function getProd($category) {
    if ($category == "books") {

        $data = array();
        $data['id'] = "1";
        $data['price'] = "50";
        $data['title'] = "Agile Software Development";
        $data['year'] = "2016";
        $data['pub'] = "IGI Global";

        return $data;
  }
     else if ($category == "smartphones") {

        $data = array();
        $data['id'] = "1";
        $data['price'] = "500";
        $data['name'] = "Google Pixel 4";
        $data['year'] = "2019";
        $data['company'] = "Google";

        return $data;
  }
  else {
            return "No products listed under that category";
  }
}

function getUser($category)
{
	if ($category == "users") {
	$data = array();
	$data['userID']=1;
	$data['username']="user1";
	
	return $data;
	}
	
}

$server = new soap_server();
$server->register("getProd");
$server->register("getUser");
//$server->service($HTTP_RAW_POST_DATA);

if ( !isset( $HTTP_RAW_POST_DATA ) ) {
	$HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
}	
$server->service($HTTP_RAW_POST_DATA);

?>