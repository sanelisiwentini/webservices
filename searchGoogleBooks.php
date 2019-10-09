
<?php
function getGoogleBooks($title, $priceLimit)
{

error_reporting(0);  // Turn off all errors, warnings and notices for easier debugging
$safequery = urlencode($title);
$resp = file_get_contents("https://www.googleapis.com/books/v1/volumes?q="."$safequery"."&filter=paid-ebooks&key=[YOUR_KEY_HERE]");

$data = json_decode($resp, true);

foreach($data['items'] as $book)
{
	$results='';
	$pic   = $book["volumeInfo"]["imageLinks"]["thumbnail"];
    $link  = $book["volumeInfo"]["canonicalVolumeLink"];
    $booktitle = $book["volumeInfo"]["title"];
	$price=$book["saleInfo"]["listPrice"]["amount"];
	
	if($price<=$priceLimit)
	{
	
	$results .= "<tr>
<td><img src=\"$pic\"></td>
<td><a href=\"$link\">$booktitle</a></td>
<td>Price: $$price</td>
</tr>
</br></br><hr />";

	}
	echo $results;
		
}

return $results;

}

?>
