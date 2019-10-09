<?php


require "searchEbayBooks.php";
require "searchGoogleBooks.php";

if(!empty($_GET['title']))
{
    $title=$_GET['title'];
	$price=$_GET['price'];
	
    $result =getEbayBooks($title, $price).getGoogleBooks($title, $price); // search $name of product as a method argument
	    
    if(empty($result))
    {
        response(404,"Product Not Found",NULL);
    }
    else
    {
        response(200,"Product Found",$result);
    }
    
}
else
{
    response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
    
	header("HTTP/1.1 ".$status);
    
    $response['status']=$status;
    $response['status_message']=$status_message;
    $response['data']=$data;
    
    $json_response = json_encode($response);
	
	echo $data;
}
?>
