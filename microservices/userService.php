<?php

echo "<h2> Users Info Service 1</h2>";

$service_url = 'http://localhost/webservices/microservices/users.json';

$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
$curl_response = curl_exec($curl);
curl_close($curl);
$decoded = json_decode($curl_response);

echo "<hr>";
echo "<b>First User </b><br>";
echo "First Name = ". $decoded->Ghani->fname;
echo "<br>";
echo "Last Name = ". $decoded->Ghani->lname;
echo "<br>";
echo "Email = ". $decoded->Ghani->email;
echo "<br>";
echo "Age = ". $decoded->Ghani->age;

?>