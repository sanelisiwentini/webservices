<?php

function showText($msg)
{
	return $msg; 
}

$msg="I am in the PHP function";
showText($msg);




	$id=10;
	$name="Sunny";
	
	echo $id ;
	//echo "<br>";
	//echo $name;
	//echo "Hello World!";

?>
<br>
<?php

echo showText($msg);

?>