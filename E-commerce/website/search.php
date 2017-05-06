<?php 
$page_name = "Search";
include "header.php";
include "db_connect.php"; 

?>
<div class="col-md-10">

<?php
$query9 = "SELECT DISTINCT title, recipe.recipe_id, image_url FROM recipe JOIN ingredients ON ingredients.recipe_id = recipe.recipe_id WHERE LOWER(ingredient_name) LIKE LOWER('%".$_POST["search"]."%')";
$result9 = $conn->query($query9);
//if search is for recipe with certain ingredient:
	if ($result9->num_rows > 0) {
		while($row = $result9->fetch_array()) {

?>

			<div id="grocery_item" class="col-md-2">
			  <div class="thumbnail">
				<img src="<?php echo $row["image_url"] ?>" alt="<?php echo $row["title"]; ?>" class="img-rounded" />
				<div class="caption">
				  <h3><?php echo $row["title"]; ?></h3>
				  <div class="go-to-recipe-btn"><a href="go_to_recipe.php?recipe_id=<?php echo $row["recipe_id"]; ?>" class="btn btn-primary" role="button">Go To Recipe</a></div>
				</div>
			  </div>
			</div>

<?php 
		}
	}
	//if no results, try to search by title of recipe
	else{
	
		$sql0 = "SELECT DISTINCT title, image_url, recipe_id FROM recipe WHERE LOWER(title) LIKE LOWER('%".$_POST["search"]."%')";
		$result0 = $conn->query($sql0);
		//if search is for title of a recipe:

			if ($result0->num_rows > 0) {
				while($row = $result0->fetch_array()) {

?>

					<div id="grocery_item" class="col-md-2">
					  <div class="thumbnail">
						<img src="<?php echo $row["image_url"] ?>" alt="<?php echo $row["title"]; ?>" class="img-rounded" />
						<div class="caption">
						  <h3><?php echo $row["title"]; ?></h3>
						  <div class="go-to-recipe-btn"><a href="go_to_recipe.php?recipe_id=<?php echo $row["recipe_id"]; ?>" class="btn btn-primary" role="button">Go To Recipe</a></div>
						</div>
					  </div>
					</div>

<?php 
				}
			}
	
	}
	
?>

<?php

$sql1 = "SELECT * FROM grocery WHERE LOWER(title) LIKE LOWER('%".$_POST["search"]."%')";
$result1 = $conn->query($sql1);
//if search is for a grocery item:
?>


	
<?php
	if($result1->num_rows > 0) {
		// output data of each row
		while($row = $result1->fetch_array()) {
	

?>
		<div id="grocery_item" class="col-md-2">
			<div class="thumbnail">
				<img src="<?php echo $row["img"];?>" alt="<?php echo $row["title"];?>" class="img-rounded" />
				<div class="caption">
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
        </div>
<?php 

		}
	}

?>
	</div>
	</div>
	</div>
	
<?php

//-----------------------------------------------------------------------------------------
$query3 = "SELECT * FROM categories JOIN recipe ON categories.recipe_id = recipe.recipe_id WHERE LOWER(category) LIKE LOWER('".$_POST["search"]."')";
$result3 = $conn->query($query3);
//if search is for category of recipes:
?>

<div id="dish_categories" class="col-sm-10">
	<div class="row">

<?php

	if ($result3->num_rows > 0) {
		// output data of each row
		while($row = $result3->fetch_array()) {

?>


			<div class="col-md-2">
			  <div class="thumbnail">
				<img src="<?php echo $row["image_url"] ?>" alt="<?php echo $row["title"]; ?>" class="img-rounded" />
				<div class="caption">
				  <h3><?php echo $row["title"]; ?></h3>
				  <p></p>
				  <div class="go-to-recipe-btn"><a href="go_to_recipe.php?recipe_id=<?php echo $row["recipe_id"]; ?>" class="btn btn-primary" role="button">Go To Recipe</a></div>
				</div>
			  </div>
			</div>

<?php 

		}
	}

?>
	</div>
</div>

<?php
include "footer.php"; 
$conn->close();
?>