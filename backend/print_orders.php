<?php
include_once(__DIR__ . "/general.php");
@session_start();
if ($_SESSION['group'] != "admin") {
	header("Location: /index.php");
}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CowShop</title>
		<meta name="description" content="CowShop">
		<meta name="author" content="42">
		<link rel="stylesheet" href="../css/styles.css">
		<link rel="stylesheet" href="../css/main.css">
	</head>
	<body>
		<div class="header">
			<?php include("../header.php"); ?>
		</div>
		<div class="man-box center-box">
			<?php
			echo '<h2 style="text-align: center;"> Historique des achats </h2>';
			echo '<hr><br>';

			$list = file_to_data("../private/order");
			print_r($list);
			if (!empty($list)) {
				foreach ($list as $p) {
					echo "<div class=\"textbox\">";
					echo "<div class=\"left\">Product: <strong>".$p."</strong></div>";
					echo "<div class=\"right\">Price: <i>".$product[$p]['price']."</i> €</div><br>";
					echo "</div><br>";
				}
			} else {
				echo "<p style=\"text-align: center;\">Pas encore de commandes.</p>";
			}
			echo '<br><hr>';
			?>
			<br>
		</div>
	</body>
</html>
