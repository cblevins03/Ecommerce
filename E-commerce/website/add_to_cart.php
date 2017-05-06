<?php
session_start();
include "db_connect.php";

$query1 = "SELECT * FROM cart WHERE user_id = '".$_SESSION["id"]."'";
$result = $conn->query($query1);
$duplicate = false;
$quantity = 0;

if ($result->num_rows > 0) {
	while($row = $result->fetch_array()) {
		//if item is already in the cart
		if($row["item_id"] == $_GET["item_id"]){
			$duplicate = true;
			$quantity = $row["quantity"] + 1;
		}
	
	}
	
	if($duplicate == true){
		$sql1 = "UPDATE cart SET quantity = ".$quantity." WHERE item_id = ".$_GET["item_id"]." AND user_id = '".$_SESSION["id"]."'";
		if ($conn->query($sql1) === TRUE) { 
			include "shoppingcart.php";
		}
	}
	else{
		$sql = "INSERT INTO cart (item_id, user_id) VALUES ('".$_GET["item_id"]."', '".$_SESSION["id"]."')";

		if ($conn->query($sql) === TRUE) {
			include "shoppingcart.php";
		} 
		else {
			include "header.php";
			echo "Error updating cart: " . $conn->error;
			include "footer.php";
		}
	
	}
}
else{
	$sql = "INSERT INTO cart (item_id, user_id) VALUES ('".$_GET["item_id"]."', '".$_SESSION["id"]."')";

	if ($conn->query($sql) === TRUE) {
		include "shoppingcart.php";
	} 
	else {
		include "header.php";
		echo "Error updating cart: " . $conn->error;
		include "footer.php";
	}
}





?>



	
