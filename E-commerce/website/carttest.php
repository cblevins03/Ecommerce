<?php
	$page_name = "Shopping Cart";
	include "cartheader.php"; 
	include "db_connect.php";
	
	$query0 = "SELECT title,price,quantity,total FROM cart";
	$result0 = $conn->query($query0);
?>
<div class="row">
	<div class="col-sm-12" style="padding-bottom:15px">
		<h1 style="text-align:center">Shopping Cart</h1>
	</div>
</div>
<div class="row">
	<div id="cart_table" class="col-sm-12">
		<table class="table table-hover">
		  <thead>
			<tr>
			  <th>Item</th>
			  <th>Name</th>
			  <th>Price</th>
			  <th colspan=2>Quantity</th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
			  <th scope="row">1</th>
			  <td>Butter</td>
			  <td>$4.99</td>
			  <td>
				<form>
					<select class="custom-select">
					  <option selected value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					</select>
				</form>
			  </td>
			  <td>
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Remove Item
				</button>
			  </td>
			</tr>
			<tr>
			  <th scope="row">2</th>
			  <td>Butter</td>
			  <td>$4.99</td>
			  <td>
				<form>
					<select class="custom-select">
					  <option selected value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					</select>
				</form>
			  </td>
			  <td>
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Remove Item
				</button>
			  </td>
			</tr>
			<tr>
			  <th scope="row">3</th>
			  <td>Salt</td>
			  <td>$4.99</td>
			  <td>
				<form>
					<select class="custom-select">
					  <option selected value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					</select>
				</form>
			  </td>
			  <td>
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Remove Item
				</button>
			  </td>
			</tr-->
		  </tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-9" style="padding-bottom:10px">
		<h3 style="text-align:right">Total (3 Items): $14.96</h3>
	</div>
</div>
<div class="row">
	<div class="col-sm-6" style="text-align:right">
		<div class="go-to-grocery-btn"><a href="grocery.php" class="btn btn-lg btn-primary" role="button">Continue Shopping</a></div>
	</div>
	<div class="col-sm-6" style="text-align:left">
		<div class="go-to-grocery-btn"><a href="#" class="btn btn-lg btn-warning" role="button">Checkout</a></div>
	</div>
</div>


	
<?php include "footer.php";?>