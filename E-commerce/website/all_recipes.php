<?php 
$page_name = "All Recipes";
include "header.php"; 
include "db_connect.php";

$query1 = "SELECT * FROM recipe ORDER BY title ASC";
$result = $conn->query($query1);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_array()) {

?>

<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
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
include "footer.php"; 
?>