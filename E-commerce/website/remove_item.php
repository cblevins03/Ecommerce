<?php 
session_start();
include "db_connect.php"; 

$sql = "DELETE FROM cart WHERE item_id = ".$_GET["item_id"]." AND user_id = '".$_SESSION["id"]."'";

if ($conn->query($sql) === TRUE) {  
	include "shoppingcart.php";
} 
else {
	include "header.php";
    echo "Error updating quantity: " . $conn->error;
}

$conn->close();
?>