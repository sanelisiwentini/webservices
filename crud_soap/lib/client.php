<?php
$client = new SoapClient(null, array(
      'location' => "http://localhost/webservices/crud_soap/lib/server.php",
      'uri'      => "http://localhost/webservices/crud_soap/lib/server.php",
      'trace'    => 1 
    )
);
?>