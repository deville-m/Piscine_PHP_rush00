<?php @session_start(); ?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/styles.css"/>
		<link rel="stylesheet" href="./css/main.css">
	</head>
	<body>
		<header>
			<div class="navbar">
				<a class="active" href="index.php">Cow Shop</a>
			</div>
		</header>
		<div class="login-page">
			<div class="form">
				<h1>Login</h1>
				<?php
				if ($_SESSION['error'])
					echo "<p>" . $_SESSION['error'] . "</p>\n";
				$_SESSION['error'] = "";
				?>
				<form class="login-form" method="post" action="api/login.php">
					<input type="text" placeholder="username" name="username" id="username" required/>
					<input type="password" placeholder="password" name="password" id="password" required/>
					<button>login</button>
					<p class="message">Pas enregistré? <a href="register.php">Creer un compte</a></p>
				</form>
			</div>
		</div>
	</body>
</html>
