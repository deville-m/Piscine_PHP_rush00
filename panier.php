<?php
include_once(__DIR__ . "/backend/general.php");
@session_start();
if ($_SESSION['group'] === "admin") {
	header("Location: admin.php");
}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CowShop</title>
		<meta name="description" content="CowShop">
		<meta name="author" content="42">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<div class="header">
			<?php include("./header.php"); ?>
		</div>
		<div class="man-box center-box">
			<?php
			$product = file_to_data(__DIR__ . "/private/product");
			echo '<h2> Panier </h2>';
			echo '<hr><br>';
			if (!empty($_SESSION['basket'])) {
				foreach ($_SESSION['basket'] as $p) {
					if (!isset($product[$p])) continue;
					echo "<div class=\"textbox\">";
					echo "<div class=\"left\">Product: <strong>".$p."</strong></div>";
					echo "<div class=\"right\">Price: <i>".$product[$p]['price']."</i> €</div><br>";
					echo "</div><br>";
				}
			} else {
				echo '<p>The cart is empty</p>';
			}
			echo '<br><hr>';
			echo 'Total: '.$_SESSION['total'].'€';
			?>
			<br>
			<form action="api/place_order.php" method="post" id="buy">
				<input type="submit" name="submit" value="acheter">
			</form>
		</div>
	</body>
</html>
