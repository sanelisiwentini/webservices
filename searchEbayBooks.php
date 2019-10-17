<?php
function getEbayBooks($title, $priceLimit)
{
error_reporting(0);

$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  
$appid = 'KEY-HERE';  

$globalid = 'EBAY-US'; 

// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$title";
$apicall .= "&paginationInput.entriesPerPage=10";

$resp = simplexml_load_file($apicall);

if ($resp->ack == "Success") {
  $results = '';
  // If the response was loaded, parse it and build links
  foreach($resp->searchResult->item as $item) {
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;
	$price=  $item->sellingStatus->currentPrice;

if($price<=$priceLimit)
{
	
    // For each SearchResultItem node, build a link and append it to $results
    $results .= "<tr>
<td><img src=\"$pic\"></td>
<td><a href=\"$link\">$title</a></td>
<td>Price: $$price</td>
</tr>
</br></br><hr />";
}
  }
}
// If the response does not indicate 'Success,' print an error
else 
{
  $results  = "<h3>Oops! The request was not successful";
 }
return $results;
}



?>