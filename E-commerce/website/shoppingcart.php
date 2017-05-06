<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	$page_name = "Shopping Cart";
	include "cartheader.php"; 
	include "db_connect.php";
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-bottom:15px">
		<h1 style="text-align:center">Shopping Cart</h1>
	</div>
</div>
<div class="row">
	<div id="cart_table" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
		<table class="table table-hover">
		  <thead>
			<tr>
			  <th>Item</th>
			  <th>Name</th>
			  <th>Price</th>
			  <th>Quantity</th>
			</tr>
		  </thead>
		  <tbody>

<?php
	$query0 = "SELECT title, price, img, cart.item_id, quantity FROM cart JOIN grocery ON cart.item_id = grocery.item_id WHERE cart.user_id = '".$_SESSION["id"]."'";
	$result0 = $conn->query($query0);
	$num = 1;
	if($result0->num_rows > 0) {
		// output data of each row
		while($row = $result0->fetch_array()) {
	

?>
			<tr>
			  <th scope="row"><?php echo $num;?></th>
			  <td><?php echo $row["title"];?></td>
			  <td>$<?php echo $row["price"];?></td>
			  <td>
				<form action="quantity_processing.php?item_id=<?php echo $row["item_id"];?>" method="post">
					<input type="number" value="<?php echo $row["quantity"]; ?>" name="quantity" min="1" style="width: 35px;" required>
					<!--<select name="quantity">
					  <option selected value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					</select>-->
					<input type="submit" value="Submit">
				</form>
			  </td>
			  <td>
				<a href="remove_item.php?item_id=<?php echo $row["item_id"];?>" class="btn btn-sm btn-danger" role="button">Remove Item</a>
			  </td>
			</tr>

<?php 
			$num++;
		}
	}
	else{
		echo "Shopping Cart is empty!";
	}
?>
		  </tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-bottom:10px">
		<h3 style="text-align:center">
<?php
			$sql1 = "SELECT SUM(quantity) AS quant FROM cart WHERE user_id = '".$_SESSION["id"]."'";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0) {
				// output data of each row
					if($row = $result1->fetch_assoc()) {
						echo "Total (". ($row["quant"] != NULL ? $row["quant"] : "0") ." Items): ";
					}
			}
			$sql2 = "SELECT quantity, price FROM cart JOIN grocery ON cart.item_id = grocery.item_id WHERE user_id = '".$_SESSION["id"]."'";
			$result2 = $conn->query($sql2);
			$total = 0.00;
			if ($result2->num_rows > 0) {
				// output data of each row
				while($row = $result2->fetch_assoc()) {
					$total += ($row["price"]* $row["quantity"]);
				}
			}
			echo "$" .$total;
?> 

	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;">
		<div class="go-to-grocery-btn" style="padding-bottom:10px"><a href="grocery.php" class="btn btn-lg btn-primary" role="button" style="width: 200px;">Continue Shopping</a></div>
		<div class="go-to-grocery-btn"><a href="payment.php" class="btn btn-lg btn-success" role="button" style="width: 200px">Checkout</a></div>

	</div>
</div>


	
<?php include "footer.php";?>