<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
		$id = session_id();
		$_SESSION["id"] = $id;
    }
	$page_name = "Home";
	include "home_header.php"; 

	include "db_connect.php";
	$new_user = true;
	$sql0 = "SELECT user_id FROM users";
	$result0 = $conn->query($sql0);

	if ($result0->num_rows > 0) {
		// output data of each row
		while($row = $result0->fetch_assoc()) {
			
			if($row["user_id"] == $_SESSION["id"]){
				$new_user = false;
			}
		}
	}
	if($new_user == true){
		$sql = "INSERT INTO users (user_id) VALUES ('".$_SESSION["id"]."')";

		if ($conn->query($sql) === TRUE) {
		}
	}
?>

  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 suggested-recipes">

    <div id="bar">
		<form action="search.php" method="post">
		  <div class="input-group">
			<input type="text" class="form-control" name="search" placeholder="Search for a recipe...">
			<span class="input-group-btn">
			  <button class="btn btn-default" type="submit" value="submit">Go</button>
			</span>
		  </div><!-- /input-group -->
		</form>
    </div>
    <div class="row">
      <?php include "trending.php"; ?>
    </div>
  </div>

 <?php include "footer.php";?>
