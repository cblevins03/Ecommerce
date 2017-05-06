<?php
include "db_connect.php";

$query1 = "SELECT title, image_url FROM recipe WHERE recipe_id = " .$_GET["recipe_id"];
$query2 = "SELECT * FROM recipe JOIN ingredients ON ingredients.recipe_id = recipe.recipe_id WHERE recipe.recipe_id = " . $_GET["recipe_id"];
$query3 = "SELECT steps, dir FROM directions WHERE recipe_id = " .$_GET["recipe_id"] ." ORDER BY dir ASC";
$result1 = $conn->query($query1);
$result2 = $conn->query($query2);
$result3 = $conn->query($query3);

if ($result1->num_rows > 0) {
	// output data of each row
	if($row = $result1->fetch_array()) {
	
		$page_name = $row["title"];

		include "header.php";
		
?>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<h1><?php echo $row["title"]; ?></h1>
			<div class="col-md-5">
			<img src="<?php echo $row["image_url"] ?>" alt="<?php echo $row["title"]; ?>" class="img-rounded" style="width: 100%;" />
			</div>
			<div id="ingredients" class="col-md-5">
				<ul class="list-unstyled" style="padding: 0;" >
<?php
	}
}
else{
	echo "0 results";
}

if ($result2->num_rows > 0) {
	// output data of each row
	while($row = $result2->fetch_array()) {
?>

					<li><strong><?php echo $row["quantity"]?> <?php echo $row["unit_of_measure"];?></strong> <?php echo $row["ingredient_name"];
										if($row["description"] != NULL){
											echo ", " . $row["description"];
										}?> 
					</li>
<?php
	}
}
else{
	echo "0 results";
}

?>

				</ul>
				<div id="buy_ingredients_btn" class="buy-ingredients-btn"><a href="get_ingredients.php?recipe_id=<?php echo $_GET["recipe_id"];?>" class="btn btn-primary btn-lg btn-block" role="button">Get Ingredients</a></div>
			</div>

			<div class="row">
				<div id="instructions" class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<h2>Directions</h2>
					<ol type="1">
<?php

if ($result3->num_rows > 0) {
	// output data of each row
	while($row = $result3->fetch_array()) {
?>

						<li><?php echo $row["steps"]; ?></li>
<?php
	}
}
else{
	echo "0 results";
}
?>
					</ol>
				</div>
			</div>
		</div>
<?php 

$conn->close();
include "footer.php";

?>
