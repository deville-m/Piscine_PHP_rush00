<?php @session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/styles.css"/>
  </head>
  <body>
	<header>
	  <div class="navbar">
		<a class="active" href="index.php">Cow Shop</a>
		<a href="index.php">Boutique</a>
	  </div>
	</header>
	<div class="login-page">
	  <div class="form">
		<h1>Register</h1>
		<?php

			if ($_SESSION['error'])
				echo "<p>" . $_SESSION['error'] . "</p>\n";

		?>
		<form class="login-form" method="post" action="api/register.php">
		  <input type="text" placeholder="username" name="username" id="username" required/>
		  <input type="password" placeholder="password" name="password" id="password" required/>
		  <button>register</button>
		  <p class="message">Déjà enregistré? <a href="login.php">Connectez vous</a></p>
		</form>
	  </div>
	</div>
  </body>
</html>
