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
  <!-- Content go here -->
</div>
  <script src="js/script.js"></script>
</body>
</html>
