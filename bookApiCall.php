<?php

      
       $title = $_REQUEST['title'];
	   $price = $_REQUEST['price'];
	   

        $url = "http://localhost/webservices/findBooks.php?title=".urlencode($title)."&price=".urlencode($price);

		$ch = curl_init($url);        // CURL session starts
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch); // CURL session closes

		echo $response;

?>
