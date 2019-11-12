<?php

require "productServerRPC.php"; // Server file is required

// Look for a valid action
if(isset($_GET['method'])) {
    switch($_GET['method']) {
        case "prodList":
            $products = new productServerRPC();
            $data = $products->getProd();
            break;
        case "prodByID":
            $prodID = (int)$_GET['prodID'];
            $products = new productServerRPC();
            $data = $products->getProdById($prodID);
            break;
		case "prodByPrice":
            $price = (int)$_GET['price'];
            $products = new productServerRPC();
            $data = $products->getProdByPrice($price);
            break;
        default:
            http_response_code(400);
            $data = array("error" => "bad request");
            break;
    }
} else {
    http_response_code(400);
    $data = array("error" => "bad request");
}

if($data==null){
   $data = array("error" => "product not found");  
}
// send the data back to the user
 header("Content-Type: application/json");
 echo json_encode($data);
?>
