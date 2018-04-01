<?php
include_once(__DIR__ . "/backend/general.php");
@session_start();
if ($_SESSION['group'] == "admin") {
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
	</head>
	<body>
		<div class="header">
			<?php include("./header.php"); ?>
		</div>		
		<span/>
		<div style="padding-top: 60px;"/>
		<div class="man-box form">
			<?php
			echo '<h2> Panier </h2>';
			echo '<hr>';
			echo 'Votre panier est vide';
			echo '<hr>';
			echo 'Total: 0€';
			?>
		</div>
	</body>
</html>
