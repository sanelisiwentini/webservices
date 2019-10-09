<?php
error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging

$bookisbn= "9780545791427";


// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'SANELISI-webservi-PRD-cdfed6342-77a0264e';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$isbn = "$bookisbn";  // You may want to supply your own query
$safeisbn = urlencode($isbn);  // Make the query URL-friendly

// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByProduct";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&productId.@type=ISBN&productId=$safeisbn";
$apicall .= "&paginationInput.entriesPerPage=10";

// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);

// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
  $results = '';
  // If the response was loaded, parse it and build links
  foreach($resp->searchResult->item as $item) {
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;
    $price=  $item->sellingStatus->currentPrice;
    

$results .= "<tr>
<td><img src=\"$pic\"></td>
<td><a href=\"$link\">$title</a></td>
<td>Price: $$price</td>
<td>Shipping price: $$price</td>

</tr>";
  }
}

// If the response does not indicate 'Success,' print an error

 
else {
  $results  = "<h3>Oops! The request was not successful.</h3>";

}

?>



<!-- Build the HTML page with values from the call response -->
<html>
<head>
<title>eBay Search Results for ISBN <?php echo $isbn; ?></title>
<style type="text/css">body { font-family: arial,sans-serif;} </style>
</head>
<body>
<h1>eBay Search Results for <?php echo $isbn; ?></h1>

<table>


<tr>
  <td>
    <?php echo $results;?>
  </td>
</tr>
</table>

</body>
<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'p3plcpnl0769'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script><script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'p3plcpnl0769'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script></html>

