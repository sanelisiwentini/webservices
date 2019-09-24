<?php

$string = file_get_contents("items.xml");

$response = new SimpleXMLElement($string);

//echo $response->book; // displays price of 1 element

foreach($response as $key => $value)
{
    echo "$key = $value <br/>";
}

print_r($response); // print array

?>