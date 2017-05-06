<?php
	$page_name = "User Account";
	include "cartheader.php"; 
	include "db_connect.php";
	
	//$query0 = "SELECT name,username,password,emailphone FROM account";
	//$result0 = $conn->query($query0);
?>

<div class="col-md-12" style="padding-bottom:5px">
	<h2><?php echo $row["name"];?>'s Account<h2>
</div>
<div class="col-md-12">
	<div class="col-md-2">
	</div>
	<div id="account" class="col-md-8" style="border: 1px silver solid; border-radius: 5px; margin:3px;">
		<form>
		  <div class="form-group">
			<label for="formGroupExampleInput">Username</label>
			<input type="text" class="form-control" id="formGroupExampleInput" placeholder="<?php echo $row["username"];?>">
		  </div>
		  <div class="form-group">
			<label for="formGroupExampleInput2">Password</label>
			<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="******">
		  </div>
		  <div class="form-group">
			<label for="formGroupExampleInput">Email</label>
			<input type="text" class="form-control" id="formGroupExampleInput" placeholder="<?php echo $row["email"];?>">
		  </div>
		  <div class="form-group">
			<label for="formGroupExampleInput">Phone</label>
			<input type="text" class="form-control" id="formGroupExampleInput" placeholder="<?php echo $row["phone"];?>">
		  </div>
		</form>
	</div>
	<div class="col-md-10" style="text-align:right; padding:5px">
		<button type="button" class="btn btn-lg btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			Save Changes
		</button>
	</div>
</div>
<?php include "footer.php";?>