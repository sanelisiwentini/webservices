<?php
$myfile = fopen("dataWebhook2.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("dataWebhook2.txt"));
fclose($myfile);
?>