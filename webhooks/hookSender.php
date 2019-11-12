<?php
error_reporting(0);
$hookEndPoints = ["http://localhost/webservices/webhooks/webhookClient1.php", 
                  "http://localhost/webservices/webhooks/webhookClient2.php", 
                  "http://localhost/webservices/webhooks/webhookClient3.php", 
                  "http://localhost/webservices/webhooks/webhookClient4.php", 
                  "http://localhost/webservices/webhooks/webhookClient5.php", 
                  "http://localhost/webservices/webhooks/webhookClient6.php", 
                  "http://localhost/webservices/webhooks/webhookClient7.php", 
                  "http://localhost/webservices/webhooks/webhookClient8.php", 
                  "http://localhost/webservices/webhooks/webhookClient9.php", 
                  "http://localhost/webservices/webhooks/webhookClient10.php"];

				 // var_dump($_POST);exit;
if($_POST) {
    
    // a Real Application would validate or look things up
    $post_body = json_encode($_POST);

    // send using streams
    $context = stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => 'Content-Type: application/json',
            'content' => $post_body,
        ]
    ]);

    foreach ($hookEndPoints as $endpoint) {
        $success = file_get_contents($endpoint, true, $context);

        echo "<p>Data Sent to:" . $endpoint . "</p>\n";
    }
	
echo "File Contents:"."<br>";
include "fileRead.php";
echo $myFile;
} 
?>

