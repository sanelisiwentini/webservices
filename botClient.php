<?php
error_reporting(0);
session_start();
 $msg = $_GET['msg'];
 $json_data = ["msg" => strtolower($msg)];

 $apiURL = "http://localhost/webservices/botAPI.php";
 $curl = curl_init($apiURL);
 $curl = curl_init($apiURL);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // GET method
 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
 curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query($json_data));

 $response = curl_exec($curl);
 curl_close($curl);

$result = json_decode($response);
$_SESSION["messages"];
if($msg!="")
{
$_SESSION["messages"].= "<tr>
<td>You: $msg</td>
</br></br>
<td>Bot: $result->status_message</td>
</tr>
</br></br><hr />";
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h2><font size="16">Car Dealership</font></h2>
<h3><font size="12">Ask our virtual store assistant anything!</font></h3>

<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form method="GET" action="botClient.php" class="form-container">
    <h1>Chat</h1>
<p><?php echo 	$_SESSION["messages"];?></p>
    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
  <?php session_destroy();?>
  }
</script>

</body>
</html>