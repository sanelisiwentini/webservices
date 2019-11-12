<?php
require_once "nusoap/lib/nusoap.php";

$client = new nusoap_client("http://localhost/webservices/soap/soapServerProductlist.php");

$searchData = array("name" => $name);

//$userData=array("category" => "users");
$result = $client->call("getProd", $searchData);
//$users=$client->call("getUser", $userData);

print_r($users);
echo "  <br> <br> UserID:".$users['userID'];
echo " <br>Username:". $users['username'];

if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error wwww</h2><pre>" . $error . "</pre>";
    }
    else {
        echo "<h2>Books</h2><pre>";
        print_r($result);
        echo "</pre>";

        echo "Price:". $result['price'];
		 echo " <br> Name:". $result['name']; 
    }
}




//If you want to inspect the SOAP request and response messages for debugging purposes

echo " <hr /> <h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";

?>