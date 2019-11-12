<?php
ini_set("soap.wsdl_cache_enabled", "0");


try {
    $client = new SoapClient('http://localhost/webservices/wsdl/soapServerWSDL.php?wsdl');
    //$events = $client->getEvents();
     //$events = $client->getEventById(3);
     //$events = $client->getEventByIDLoc(1,"Kuala Lumpur");
     //$events = $client->getEventByLoc("Toronto");
	 
	 $events = $client->getEventByDate("1454112000");
    print_r($events);
	
	
} catch (SoapFault $e) {
    var_dump($e);
}
?>
