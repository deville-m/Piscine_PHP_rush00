<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<title>SilkRoad</title>
	<meta name="description" content="SilkRoad market">
	<meta name="author" content="42">
	<link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
      <header>
       	<div class="navbar">
	         <a class="active" href="#">Cow Shop</a>
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
	<div class="cat-box">
	  <h2>Création catégorie</h2>
	  <form action="api/create_category.php" method="post">
		Catégorie: <input type="text" name="name" placeholder="Ex: Useless Things">
		<input type="checkbox" name="visible" value="visibility"> Visible?
		<input type="submit"><br>
	  </form>
	</div>
	<hr>
	<div class="mk-box">
	  <h2>Création produit</h2>
	  <form action="api/create_product.php" method="post" id="mk">
		Nom: <input type="text" name="name" placeholder="Ex: Lasso saucisson"><br>
		Prix: <input type="number" name="prix" min="0"><br>
	    <?php
        echo 'Categorie: <select name="liste" form="mk">';
		$list = explode(" ", "Liste d'elements dans la categorie a afficher apres requette csv");
		foreach ($list as $e) {
		    echo "<li>".$e."</li>";
			echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
		}
        echo '</select>';
		?>
		<input type="submit"><br>
	  </form>
	</div>
	<hr>
	<div class="rm-box">
	  <h2>Supprimer produit</h2>
	  <form action="api/create_category.php" method="post" id="rm">
	    <?php
        echo 'Produit: <select name="liste" form="rm">';
		$list = explode(" ", "ceci est une liste de produits a supprimer");
		foreach ($list as $e) {
		    echo "<li>".$e."</li>";
			echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
		}
        echo '</select>';
		?>
		<input type="submit">
	  </form>
	</div>
	<hr>
	<div class="viz-box">
	  <h2>Rendre Visible</h2>
	  <form action="api/make_visible.php" method="post" id="viz">
        <?php
        echo 'Produit: <select name="liste" form="viz">';
		$list = explode(" ", "ceci est une liste");
		foreach ($list as $e) {
		    echo "<li>".$e."</li>";
			echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
		}
        echo '</select><br>';
        echo 'Categorie: <select name="liste2" form="viz">';
		$list = explode(" ", "ceci est une liste");
        foreach ($list as $e) {
            echo "<li>".$e."</li>";
			echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
        }
        echo '</select><br>';
		?>
	  <input type="submit">
	  </form>
	</div>
	<hr>
	<div class="man-box">
      <h2>Gestion Utilisateurs</h2>
	  <form action="api/user_manage.php" method="post" id="manage">
		<?php
        echo 'Supprimer compte: <select name="liste" form="manage">';
		$list = explode(" ", "ceci est une liste");
		foreach ($list as $e) {
		    echo "<li>".$e."</li>";
			echo '<option value="'.$e.'">'.ucfirst($e).'</option>';
		}
        echo '</select>';
		?>
	  <input type="submit">
	  </form>
	</div>
  </body>
</html>
