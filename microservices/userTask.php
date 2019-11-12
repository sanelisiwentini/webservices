<?php

echo "<h2> Users Tasks Service 2</h2>";

$service_url = 'http://localhost/webservices/microservices/taskList.json';

$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
$curl_response = curl_exec($curl);
curl_close($curl);
$decoded = json_decode($curl_response);

echo "<hr>";
echo "<b>First User </b>";
echo "<br> First Task = ". $decoded->Ghani->home[0];
echo "<br> Second Task = ". $decoded->Ghani->home[1];
echo "<br> Third Task = ". $decoded->Ghani->home[1];

?>