<?php @session_start();

	include_once ("./backend/general.php");

  if ($_GET)
  {
    if (($_GET['type'] === "category" || $_GET['type'] === "product") && $_GET['id'])
    {
      $type = $_GET['type'];
			if (($tmp = file_to_data("./private/category")) === false)
			{
				header("Location: /index.php");
				exit ("TO\n");
			}
			$cat_list = array();
			foreach ($tmp as $key => $value)
				$cat_list[] = $key;
			if (!in_array($_GET['id'], $cat_list))
			{
				header("Location: /index.php");
				exit ;
			}
      $id = $_GET['id'];
			$_SESSION['current_page'] = "?type=".$_GET['type']."&id=".$_GET['id'];
    }
    else
		{
      $_GET['type'] = "all";
			$_SESSION['current_page'] = "";
		}
  }
	else
	{
		$_GET['type'] = "all";
		$_SESSION['current_page'] = "";
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
</head>
<body>
	<div class="header">
		<?php
		  include("./header.php");
		?>
	</div>
	<div class="main-right-menu">
		<?PHP
			if ($_GET['type'] !== "all")
			{
				echo "<ul class=\"menu-ul\">";
				echo "<a href=\"index.php\"><li class=\"category\">See All Categories</li></a>";
				echo "</ul>";
			}
		?>
		<h2>So many Coooooow Categories!</h2>
		<ul class="menu-ul">
			<?php
  			$type = "category";
  			include ("./backend/templates/list_of_categories.php");
			?>
		</ul>
    <?PHP
    if ($_GET['type'] === "all")
    {
		    echo "<h2>Each Cow is a unique gem!</h2>";
		    echo "<ul class=\"menu-ul\">";
        $type = "product";
        include ("./backend/templates/list_of_categories.php");
		    echo "</ul>";
    }
    ?>
	</div>
	<div class="main-container">
		<?PHP
			if ($_GET['type'] === "all")
			{
				echo "<h1>Select a Classy Cow Class (CCC)</h1>";
				echo "<ul class=\"tile-mosaic\">";
  			$type = "category";
  			include ("./backend/templates/display_tiles.php");
			}
			else
			{
				echo "<h1>Cows of the classy category: ".$_GET['id']."</h1>";
				echo "<ul class=\"tile-mosaic\">";
				$type = "product";
				$id = $_GET['id'];
				include ("./backend/templates/display_tiles.php");
			}
			echo "</ul>";
		?>
    <?PHP
      if ($_GET['type'] === "all")
    	{
		    echo "<h1>Mmmmmm look at those Cow</h1>";
				echo "<ul class=\"tile-mosaic\">";
  				$type = "product";
  				include ("./backend/templates/display_tiles.php");
        echo "</ul>";
      }
		?>
	</div>

	<div class="footer">
		<h6>&copy CowShop 2018</h6>
	</div>
</body>
</html>
