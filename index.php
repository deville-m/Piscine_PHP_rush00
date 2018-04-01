<?php @session_start();

  if ($_GET)
  {
    if ($_GET['type'])
    {
      $type = $_GET['type'];
      $id = $_GET['id'];
    }
    else
      $_GET['type'] = "all";
  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CowShop</title>
		<meta name="description" content="The official Cow shop">
		<meta name="author" content="42">
		<link rel="stylesheet" href="./css/main.css">
		<link rel="stylesheet" href="css/styles.css">
		<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="header">
			<?php
			include("./header.php");
			?>
		</div>
		<div class="main-right-menu">
			<h2>So many Coooooow Categories!</h2>
			<ul class="menu-ul">
				<?php
				$type = "category";
				include ("./backend/templates/list_of_categories.php");
				?>
			</ul>
			<h2>Each Cow is a unique gem!</h2>
			<ul class="menu-ul">
				<?php
				$type = "product";
				include ("./backend/templates/list_of_categories.php");
				?>
			</ul>
		</div>
		<div class="main-container">
			<h1>Select a Classy Cow Class (CCC)</h1>
			<ul class="tile-mosaic">
				<?php
				$type = "category";
				include ("./backend/templates/display_tiles.php");
				?>
			</ul>
			<h1>Mmmmmm look at those Cow</h1>
			<ul class="tile-mosaic">
				<?php
				$type = "product";
				include ("./backend/templates/display_tiles.php");
				?>
			</ul>
		</div>

		<div class="footer">
			<h6>&copy CowShop 2018</h6>
		</div>
	</body>
</html>
