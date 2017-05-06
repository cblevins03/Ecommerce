<?php
include "db_connect.php";

$query1 = "SELECT title, image_url FROM recipe WHERE recipe_id = " .$_GET["recipe_id"];
$query2 = "SELECT * FROM recipe JOIN ingredients ON ingredients.recipe_id = recipe.recipe_id WHERE recipe.recipe_id = " . $_GET["recipe_id"];
$result1 = $conn->query($query1);
$result2 = $conn->query($query2);

if ($result1->num_rows > 0) {
	// output data of each row
	if($row = $result1->fetch_array()) {
	
		$page_name = $row["title"];

		include "header.php";
		
?>

  <div class="col-md-7">
	<h1><?php echo $row["title"]; ?></h1>
  </div>
  <div class="col-md-4">
	<img src="<?php echo $row["image_url"] ?>" alt="<?php echo $row["title"]; ?>" class="img-rounded" style="width: 100%;" />
  </div>
  <div class="col-md-4">
	<ul style="padding: 0;">
	
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

		<li><strong><?php echo $row["quantity"]?> <?php echo $row["unit_of_measure"]?></strong> <?php echo $row["ingredient_name"] ?> </li>
<?php
	}
}
else{
	echo "0 results";
}

$conn->close();
?>

	</ul>
  </div>

<?php include "footer.php"; ?>
