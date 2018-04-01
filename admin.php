<?php

include (__DIR__ . "/backend/general.php");

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
      <header>
       	<div class="navbar" style="z-index: 500;">
	         <a class="active" href="index.php">Cow Shop</a>
	         <a href="index.php">Boutique</a>
             <?php
             if (isset($_SESSION)) {
                 switch ($_SESSION['group']) {
                 case "admin":
                     echo '<a style="float:right" href="admin.php">'.$_SESSION['logged_on_user'].'</a>';
                     echo '<a style="float:right" href="api/logout.php">'.'logout'.'</a>';
                     break;
                 case "client":
                     echo '<a style="float:right" href="panier.php">panier ('."12".'€)</a>';
                     echo '<a style="float:right" href="index.php">'.$_SESSION['logged_on_user'].'</a>';
                     echo '<a style="float:right" href="api/logout.php">'.'logout'.'</a>';
                     break;
                 case "":
                     echo '<a style="float:right" href="panier.php">panier ('."0".'€)</a>';
                     echo '<a style="float:right" href="login.php">'.'log in'.'</a>';
                     echo '<a style="float:right" href="register.php">'.'sign up'.'</a>';
                 }
             }
             ?>
	       </div>
         </header>
    <span/>
	<div style="padding-top: 60px;">

	
	<div class="cat-box form">
	  <h2>Création catégorie</h2>
	  <form action="api/create_category.php" method="post">
		Catégorie: <input type="text" name="name" placeholder="Ex: Useless Things">
         Visible? <input type="checkbox" name="visible" value="visibility"><br>
		<input type="submit" value="OK"><br>
	  </form>
	</div>


	<div class="mk-box form">
	  <h2>Création produit</h2>
	  <form action="api/create_product.php" method="post" id="mk">
		Nom: <input type="text" name="name" placeholder="Ex: Lasso saucisson"><br>
		Prix: <input type="number" name="price" min="0"><br>
        Quantite: <input type="number" name="quantity" min="0">
		Visible? <input type="checkbox" name="visible" value="visibility"><br>
		Catégorie: <br>
			<select name="liste" form="mk" multiple>
	    	<?php
	    		$list = get_data_key_list(__DIR__ . "/private/product");
				foreach ($list as $e) {
		    		echo "<li>".$e."</li>";
					echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
				}
			?>
			</select>
		<input type="submit" value="OK"><br>
	  </form>
	</div>
	
	
	<div class="rm-box form">
	  <h2>Supprimer produit</h2>
	  <form action="api/remove_category.php" method="post" id="rm">
	  	Produit: <select name="category" form="rm">
	    	<?php
				$list = get_data_key_list(__DIR__ . "/private/product");
				foreach ($list as $e) {
		    		echo "<li>".$e."</li>";
					echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
				}
			?>
			</select>
		<input type="submit" value="OK">
	  </form>
	</div>
	

	<div class="viz-box form">
	  <h2>Rendre Visible</h2>
	  <form action="api/make_visible.php" method="post" id="viz">
	  	Produit: <select name="liste" form="viz">
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
	  <input type="submit" value="OK">
	  </form>
	</div>
	

	<div class="man-box form">
      <h2>Gestion Utilisateurs</h2>
	  <form action="api/user_manage.php" method="post" id="manage">
	  	Supprimer compte: <select name="liste" form="manage">
		<?php
			$list = get_data_key_list(__DIR__ . "/private/passwd");
			foreach ($list as $e) {
			    echo "<li>".$e."</li>";
				echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
			}
		?>
		</select>
	  <input type="submit" value="OK">
	  </form>
	</div>
  

  </body>
</html>
