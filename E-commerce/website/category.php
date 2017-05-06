<?php
 
$page_name = $_GET["category"];
include "header.php"; 
include "db_connect.php";

$query1 = "SELECT * FROM categories JOIN recipe ON categories.recipe_id = recipe.recipe_id WHERE category LIKE '". $_GET["category"]."'";
$result = $conn->query($query1);
?>

<div id="dish_categories" class="col-sm-10">
    <div class="row">
		<div id="categories" class="col-md-10">
			<h1><?php echo $_GET["category"];?> Recipes</h1>
		</div>
	</div>
	<div class="row">

<?php

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_array()) {

?>


<div class="col-xs-10 col-sm-6 col-md-2 col-lg-2">
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
<?php include "footer.php"; ?>