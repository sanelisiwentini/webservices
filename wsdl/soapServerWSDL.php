<?php
require "eventServerWSDL.php";
$server = new SoapServer('wsdl'); // wsdl file name
$server->setClass('eventServerWSDL');
$server->handle();
?>
