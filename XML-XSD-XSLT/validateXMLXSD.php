<?php

$xml = new DOMDocument();
$xml->load('phones.xml');

if(!$xml->schemaValidate('phones.xsd')){
	
	echo "invalid";
}else
{
	echo "Valid <br>";	
	$data = simplexml_load_file('phones.xml');	
	$total = count((array)$data);
	
	//print_r($data);
	echo "<hr>".  $data->samsung->model;
	//echo "<hr>".  $data->samsung1->model;
	/*
	foreach($data as $key => $value) {
		
        echo "<br>";
		echo $data->$key->model;	
		echo "<br>";
		echo $data->$key->year;
		echo "<br>";
		echo $data->$key->price;
		
	}   */
	
}
?>
