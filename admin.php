<?php

include_once(__DIR__ . "/backend/general.php");

@session_start();
if ($_SESSION['group'] !== "admin")
	header("Location: ../index.php");

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
		<div style="padding-top: 60px;">

			<div class="cat-box form">
				<h2>Création catégorie</h2>
				<form action="api/create_category.php" method="post">
					Catégorie: <input type="text" name="name" placeholder="Ex: Useless Things"required>
					Image: <input type="url" name="image" placeholder="Ex: https://google.com/image/..."required>
					Visible? <input type="checkbox" name="visible" value="visibility"><br>
					<input type="submit" name="submit" value="OK"><br>
				</form>
				<hr>
				<h2>Création produit</h2>
				<form action="api/create_product.php" method="post" id="mk">
					Nom: <input type="text" name="name" placeholder="Ex: Lasso saucisson"required><br>
					Prix: <input type="number" name="price" min="0"required><br>
					Quantite: <input type="number" name="quantity" min="0"required>
					Image: <input type="url" name="image" placeholder="Ex: https://google.com/image/..."required>
					Visible? <input type="checkbox" name="visible" value="visibility"><br>
					Catégorie: <br>
					<select name="liste" form="mk" multiple required>
						<?php
						$list = get_data_key_list(__DIR__ . "/private/category");
						foreach ($list as $e) {
							echo "<li>".$e."</li>";
							echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
						}
						?>
					</select>
					<input type="submit" name="submit" value="OK"><br>
				</form>
			</div>

			<div class="mk-box form">
				<h2>Update produit</h2>
				<form action="api/update_product.php" method="put" id="update">
					Produit a modifier: <select name="product" form="update" required>
					<?php
					$list = get_data_key_list(__DIR__ . "/private/product");
					foreach ($list as $e) {
						echo "<li>".$e."</li>";
						echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
					}
					?>
					</select>

					Nouveau Nom: <input type="text" name="name" placeholder="Ex: Lasso saucisson"required><br>
					Nouveau Prix: <input type="number" name="price" min="0"required><br>
					Nouvelle Quantite: <input type="number" name="quantity" min="0"required>
					Nouvelle Image: <input type="url" name="image" placeholder="Ex: https://google.com/image/..."required>
					Visible? <input type="checkbox" name="visible" value="visibility"><br>
					Catégorie: <br>
					<select name="liste" form="update" multiple required>
						<?php
						$list = get_data_key_list(__DIR__ . "/private/category");
						foreach ($list as $e) {
							echo "<li>".$e."</li>";
							echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
						}
						?>
					</select>
					<input type="submit" name="submit" value="OK"><br>
				</form>
			</div>
			
			<div class="rm-box form">
				<h2>Supprimer produit</h2>
				<form action="api/remove_product.php" method="post" id="rm">
					Produit: <select name="product" form="rm" required>
					<?php
					$list = get_data_key_list(__DIR__ . "/private/product");
					foreach ($list as $e) {
						echo "<li>".$e."</li>";
						echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
					}
					?>
					</select>
					<input type="submit" name="submit" value="OK">
				</form>
				<hr>
				<h2>Supprimer catégorie</h2>
				<form action="api/remove_category.php" method="post" id="rms">
					Catégorie: <select name="category" form="rms" required>
					<?php
					$list = get_data_key_list(__DIR__ . "/private/category");
					foreach ($list as $e) {
						echo "<li>".$e."</li>";
						echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
					}
					?>
					</select>
					<input type="submit" name="submit" value="OK">
				</form>
				<hr>
				<h2>Rendre Visible</h2>
				<form action="api/make_visible.php" method="post" id="viz">
					Produit: <select name="liste" form="viz" required>
					<?php
					$list = get_data_key_list(__DIR__ . "/private/product");
					foreach ($list as $e) {
						echo "<li>".$e."</li>";
						echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
					}
					echo '</select><br>';
					echo 'Categorie: <select name="liste2" form="viz">';
					$list = get_data_key_list(__DIR__ . "/private/category");
					foreach ($list as $e) {
						echo "<li>".$e."</li>";
						echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
					}
					?>
					</select><br>
					<input type="submit" name="submit" value="OK">
				</form>
			</div>
			
			<div class="man-box form">
				<h2>Gestion Utilisateurs</h2>
				<form action="api/user_manage.php" method="post" id="manage">
					Supprimer compte: <select name="liste" form="manage" required>
					<?php
					$list = get_data_key_list(__DIR__ . "/private/passwd");
					foreach ($list as $e) {
						echo "<li>".$e."</li>";
						echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
					}
					?>
					</select>
					<input type="submit" name="submit" value="OK">
				</form>
			</div>
	</body>
</html>
