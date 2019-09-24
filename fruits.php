<?php
$string = file_get_contents("fruits.json");
$items = json_decode($string, true);

 echo "<hr>";
 echo "Berries:"."<br/>";
 echo " Type &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Price per kg &nbsp;&nbsp; <br>";
 
foreach($items['berries']  as  $berries) // fetch all arrays, including nested arrays
{
    //$arraySize = count($berries); // get size of each nested array
	echo $berries['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;$".$berries['priceperkg']."<br/>"; 
   		
      
}
echo "<hr>"; // print a horizontal line
echo "Melons:"."<br/>";
echo "*All melons cost $".$items['melons']['priceperkg']."<br/>"; 
foreach($items['melons']['type']  as  $melons) // fetch all arrays, including nested arrays
{  
	echo $melons['name']."<br/>"; 
 }
?>