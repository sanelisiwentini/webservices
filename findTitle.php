<!-- Build the HTML page with values from the call response -->
<html>
<head>
<title>Google Books Search Results for </title>
<style type="text/css">body { font-family: arial,sans-serif;} </style>
</head>
<body>

<h1>Enter Search Criteria </h1>

<table>
<tr>
  <td>
    <form method="GET" action="findTitle.php">
       Book Title <input type="text" name="title" value="">
	   ISBN <input type="text" name="isbn" value="">
	   Price <select name="price">
    <option value="$5">$5</option>
    <option value="$10">$10</option>
    <option value="$15">$15</option>
  </select>
       <input type="submit" value="Search">
    </form>
	
  </td>
</tr>
</table>

</body>
</html>
<?php

//eBay Finding API to search products on eBay, 10 proeducts only, e.g., harry potter
// http://localhost/COSC465/Labs/Lab4-eBay/MySample.php


//error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging
error_reporting(0);  // Turn off all errors, warnings and notices for easier debugging

$query = $_GET['title'];  // You may want to supply your own query
$priceLimit = $_GET['price'];

//$query = "9781781100509";  
$safequery = urlencode($query);  // Make the query URL-friendly

// Load the call and capture the document returned by eBay API
$resp = file_get_contents("https://www.googleapis.com/books/v1/volumes?q="."$safequery"."&key=[YOUR_KEY_HERE]");



$data = json_decode($resp, true);
foreach($data['items'] as $book)
{
	echo $book["volumeInfo"]["title"];
	echo "</br>";
	
	if($book["saleInfo"]["saleability"]=="NOT_FOR_SALE")
	{
	echo "Not For Sale";
	}
	else
	{
		$price=$book["saleInfo"]["listPrice"]["amount"];
		echo "$".$price;
	}
	
   
   echo"</td></tr><hr />";
}
//$json=json_encode($data);
//echo $resp;
exit;


?>
