<?php
$message = ""; // initial message 

// Includs client to get $client object
include 'lib/client.php';

// Updating the table row with submited data according to id once form is submited 
if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	/**
	* Calling the "update" method by "__soapCall" from SOAP SERVER 
	* $client: object of SOAP CLIENT
	* @params: $id, $name, $email, $address
	*/
	if( $client->__soapCall("update", array($id, $name, $email, $address))  ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // id from url

/**
* Calling the "getById" method by "__soapCall" from SOAP SERVER 
* $client: object of SOAP CLIENT
* @params: $id
*/
$data = $client->__soapCall("getById", array($id));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<tr>
				<td>Name:</td>
				<td><input name="name" type="text" value="<?php echo $data['name'];?>"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input name="email" type="text" value="<?php echo $data['email'];?>"></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><textarea name="address"><?php echo $data['address'];?></textarea> </td>
			</tr>
			<tr>
				<td><a href="read.php">Back</a></td>
				<td><input name="submit_data" type="submit" value="Update Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>