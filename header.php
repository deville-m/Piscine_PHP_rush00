<?php @session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>CowShop</title>
  <meta name="description" content="The official cow shopd">
  <meta name="author" content="42">
  <link rel="stylesheet" href="css/styles.css">
  <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
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
              echo '<a style="float:right" href="api/logout.php">'.'Logout'.'</a>';
              break;
          case "client":
              echo '<a style="float:right" href="panier.php">Panier ('."12".'€)</a>';
              echo '<a style="float:right" href="index.php">'.$_SESSION['logged_on_user'].'</a>';
              echo '<a style="float:right" href="api/logout.php">'.'Logout'.'</a>';
              break;
          case "":
              echo '<a style="float:right" href="panier.php">Panier ('."0".'€)</a>';
              echo '<a style="float:right" href="login.php">'.'Log In'.'</a>';
              echo '<a style="float:right" href="register.php">'.'Sign Up'.'</a>';
          }
      }
      ?>
	</div>
  </header>
</div>
  <script src="js/script.js"></script>
</body>
</html>
