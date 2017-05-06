<?php
include "db_connect.php";

$query0 = "SELECT * FROM recipe ORDER BY RAND() LIMIT 1";
$result0 = $conn->query($query0);

if ($result0->num_rows > 0) {
	// output data of each row
	if($row = $result0->fetch_array()) {
	
		$page_name = $row["title"];

		include "header.php";
	
		$query2 = "SELECT * FROM recipe JOIN ingredients ON ingredients.recipe_id = recipe.recipe_id WHERE recipe.recipe_id = " . $row["recipe_id"];
		$query3 = "SELECT steps, dir FROM directions WHERE recipe_id = " . $row["recipe_id"] ." ORDER BY dir ASC";
		$query4 = "SELECT recipe_id FROM recipe WHERE recipe_id = " . $row["recipe_id"];
		$result2 = $conn->query($query2);
		$result3 = $conn->query($query3);
		$result4 = $conn->query($query4);

				
?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
					<h1><?php echo $row["title"]; ?></h1>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
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

		
		if ($result4->num_rows > 0) {
					// output data of each row
					if($row = $result4->fetch_array()) {
?>

						</ul>
						<div id="buy_ingredients_btn" class="buy-ingredients-btn"><a href="get_ingredients.php?recipe_id=<?php echo $row["recipe_id"];?>" class="btn btn-primary btn-lg btn-block" role="button">Get Ingredients</a></div>
					</div>

					<div class="row">
						<div id="instructions" class="col-lg-10">
							<h2>Directions</h2>
							<ol type="1">
<?php
					}
		}

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
