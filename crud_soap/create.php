<?php
$message = ""; // initial message 
if( isset($_POST['submit_data']) ){

	// Includs client to get $client object
	include 'lib/client.php';

	// Gets the data from post
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	/**
	* Calling the "insert" method by "__soapCall" from SOAP SERVER 
	* $client: object of SOAP CLIENT
	* @params: $name, $email, $address
	*/
	if( $client->__soapCall("insert", array($name, $email, $address)) ){
		$message = "Data is inserted successfully.";
	}else{
		$message = "Sorry, Data is not inserted.";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Data</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="create.php" method="post">
			<tr>
				<td>Name:</td>
				<td><input name="name" type="text"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input name="email" type="text"></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><textarea name="address"></textarea></td>
			</tr>
			<tr>
				<td><a href="read.php">See Data</a></td>
				<td><input name="submit_data" type="submit" value="Insert Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>