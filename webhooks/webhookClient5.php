<?php

$data = json_decode(file_get_contents("php://input"), true);

file_put_contents("dataWebhook5.txt", print_r($data, true));

?>
