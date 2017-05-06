<?php
include "db_connect.php";
$page_name = "Ingredients";
include "header.php";


$query1 = "SELECT * FROM grocery JOIN ingredients ON ingredients.ingredient_id = grocery.ingredient_id WHERE recipe_id = " .$_GET["recipe_id"];
$result1 = $conn->query($query1);
?>

	<div id="groceries" class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
    <div class="row">
	
	
<?php
if ($result1->num_rows > 0) {
	// output data of each row
	while($row = $result1->fetch_array()) {
		
?>
		
			

      <div id="grocery_item" class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="thumbnail">
          <img src="<?php echo $row["img"];?>" alt="<?php echo $row["title"];?>" class="img-rounded" />
            <h3 style="text-align: center"><?php echo $row["title"];?></h3>
            <div class="btn-group btn-block">
			  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				$<?php echo $row["price"];?><span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
				<li><a href="add_to_cart.php?item_id=<?php echo $row["item_id"]; ?>">Add to Cart</a></li>
			  </ul>
			</div>
          </div>
        </div>



<?php 

		}
	}
	
?>
	</div>
	</div>
	
	
<?php include "footer.php";?>
		