<?php

include_once(__DIR__ . "/backend/general.php");
date_default_timezone_set('Europe/Paris');
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
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="header">
		<?php include("./header.php"); ?>
	</div>
	<div class="cat-box center-box">
		<h2>Category creation</h2>
		<p class="p_admin">A whole new category? Today is a great day!</p>
		<form action="api/create_category.php" method="post">
			<ul class="ul_line">
				<li class="list_line">
					<input type="text" name="name" placeholder="Name"required>
				</li>
				<li class="list_line">
					<input type="url" name="image" placeholder="Image URL"required>
				</li>
				<li class="list_line">
					<ul class="ul_line">
						<li class="list_line check_cat">
							Visible? <input type="checkbox" name="visible" value="visibility">
						</li>
					</ul>
				</li>
				<li>
					<input class="valid_btn over-pointer" type="submit" name="submit" value="OK"><br>
				</li>
			</ul>
		</form>
		<hr>
		<h2>Product creation</h2>
		<p class="p_admin">Great! A new cow.</p>
		<form action="api/create_product.php" method="post" id="mk">
			<ul class="ul_line">
			<li class="list_line">
				<input type="text" name="name" placeholder="Name"required>
			</li>
			<li class="list_line">
				<input type="number" placeholder="Price"  name="price" step="1" min="0"required>
			</li>
			<li class="list_line">
				<input type="number" placeholder="Quantity" name="quantity" step="1" min="0"required>
			</li>
			<li class="list_line">
				<input type="url" name="image" placeholder="Image URL"required>
			</li>
			<li class="list_line">
				<ul class="ul_line">
					<li class="list_line check_cat">
						Visible? <input type="checkbox" name="visible" value="visibility">
					</li>
					<li class="list_line check_cat">
						Mise a Jour: <input type="checkbox" name="maj" value="maj">
					</li>
				</ul>
			</li>

			<li>
				<h3>Categories</h3>
				<ul class="ul_line">
				<?PHP
					$list = get_data_key_list(__DIR__ . "/private/category");
					foreach ($list as $key) {
						echo "<li class=\"list_line check_cat\">".$key.' <input type="checkbox" name="' . $key . '" value="maj"></li>';
					}
				?>
			</li>
			<li><input class="valid_btn over-pointer" type="submit" name="submit" value="OK"></li>
			</ul>
		</form>
	</div>

	<div class="rm-box center-box">
		<h2>Delete a Category</h2>
		<p class="p_admin">Such a shame, I loved those cows.</p>
		<form action="api/remove_category.php" method="post" id="rms">
				<ul class="ul_line">
					<li class="list_line check_cat">
						<p>Category:</p>
					</li>
					<li class="list_line check_cat">
						<select name="category" form="rms" required>
						<?php
						$list = get_data_key_list(__DIR__ . "/private/category");
						foreach ($list as $e) {
							echo "<li>".$e."</li>";
							echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
						}
						?>
						</select>
					</li>
					<li class="list_line check_cat">
							<input type="submit" name="submit" value="OK">
					</li>
				</ul>
		</form>
		<hr>


		<h2>Delete a Product</h2>
		<p class="p_admin">Are you sure you want to "Delete" her?</p>
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

	<div class="man-box center-box">
		<h2>Historique des achats</h2>
		<?php
		$list = file_to_data("./private/order");
		if (!empty($list)) {
			foreach ($list as $p) {
				$tot = 0;
				echo "<hr>";
				echo "<div class=\"textbox\">";
				echo "<h3><b>".$p['user']."</b> the <i>".date("Y-m-d H:i:s",$p['timestamp'])."</i>"."</h3>";
				echo "<ul>";
				foreach ($p['products'] as $x => $pp) {
					$tot += $pp[0];
					echo "<li><u>".$x."</u> x <b>".$pp[1]."</b> for ".$pp[0]."€</li>";
				}
				echo "</ul>";
				echo "<p style=\"text-align: right;\">Total: <b>".$tot."</b>€</p>";
				echo "</div>";
			}
		} else {
			echo "<p style=\"text-align: center;\">Pas encore de commandes.</p>";
		}
		echo '<br><hr>';
		?>
	</div>
	
	<div class="man-box center-box">
		<h2>Gestion Utilisateurs</h2>
		<form action="api/user_manage.php" method="post" id="manage">
			Supprimer compte: <select name="liste" form="manage" required>
			<?php
			$list = get_data_key_list(__DIR__ . "/private/passwd");
			foreach ($list as $e) {
				if ($e == "root") continue;
				echo "<li>".$e."</li>";
				echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
			}
			?>
			</select>
			<input type="submit" name="submit" value="OK">
		</form>
		<hr>
		<h2>Update Groupe</h2>
		<form action="api/update_group.php" method="post" id="manageg">
			Compte: <select name="user" form="manageg" required>
			<?php
			$list = get_data_key_list(__DIR__ . "/private/passwd");
			foreach ($list as $e) {
				if ($e == "root") continue;
				echo "<li>".$e."</li>";
				echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
			}
			?>
			</select><br>
			Nouveau groupe:
			<select name="group" form="manageg" required>
				<option value="admin">admin</option>
				<option value="client">client</option>
			</select>
			<input type="submit" name="submit" value="OK">
		</form>
	</div>

</body>
</html>
