<?php

$myfile = fopen("phone.xml", "r") or die("Unable to open file!");
$xml = fread($myfile,filesize("phone.xml"));
fclose($myfile);


$myfile = fopen("phone.dtd", "r") or die("Unable to open file!");
$dtd = fread($myfile,filesize("phone.dtd"));
fclose($myfile);


$root = 'phone';

$base = 'data://text/plain;base64,'.base64_encode($dtd);

$dom = new DOMDocument;
$dom->loadXML($xml);

$domImp = new DOMImplementation;
$doctype = $domImp->createDocumentType($root, null, $base);
$newDoc = $domImp->createDocument(null, null, $doctype);
$newDoc->encoding = "utf-8";

$domNode = $dom->getElementsByTagName($root)->item(0);
$newNode = $newDoc->importNode($domNode, true);
$newDoc->appendChild($newNode);

if (@$newDoc->validate()) {
    echo "Valid <br>";
	$data = simplexml_load_file('phone.xml');	
    echo $data->name;
	echo $data->price;
	
} else {
    echo "Not valid";
}
?>