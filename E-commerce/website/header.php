<head>
  <link rel="stylesheet" href="styles.css">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Set favicon -->
  <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">

  <title>EZ Recipes<?php if($page_name != "") echo ": " . $page_name ?></title>
</head>

<body>

<nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-cutlery">&nbsp;</span>EZ Recipes</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="grocery.php">Grocery Store</a></li>
		<!--<li><a href="account.php">User Account</a></li>-->
		<li><a href="shoppingcart.php">Shopping Cart</a></li>
        <!--li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li-->
		
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li>		
			<form action="search.php" method="post" class="navbar-form navbar-left">
				<div class="form-group">
				  <input type="text" class="form-control" name="search" placeholder="Search">
				</div>
			</form>
		</li>
        <li><a href="help.php">Help</a></li>
        <!--li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul-->
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
</nav>

<div class="container-fluid">
  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2" style="padding: 0; margin: 0;">
	<div class="list" style="margin-bottom: 15px">
	  <span class="list-group-item active" style="font-weight: bold">Categories</span>
	  <a href="category.php?category=Vegetarian" class="list-group-item">Vegetarian</a>
	  <a href="category.php?category=Italian" class="list-group-item">Italian</a>
	  <a href="category.php?category=American" class="list-group-item">American</a>
	  <a href="category.php?category=Drink" class="list-group-item">Drinks</a>
	</div>
	<div class="list" style="margin-bottom: 15px">
	  <span class="list-group-item active" style="font-weight: bold">Tools</span>
	  <a href="all_recipes.php" class ="list-group-item">All Recipes</a>
	  <a href="popular_recipes.php" class="list-group-item">Popular Recipes</a>
	  <a href="feeling_lucky.php" class="list-group-item">I'm Feeling Lucky</a>
	</div>
  </div>  