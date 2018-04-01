<?php @session_start(); ?>
<html>
<body>
  <header>
	<div class="navbar" style="z-index: 500;">
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
</body></html>
