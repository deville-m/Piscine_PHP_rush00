<?php @session_start(); ?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/styles.css"/>
		<link rel="stylesheet" href="./css/main.css">
	</head>
	<body>
		<div class="header">
			<?php
			  include("./header.php");
			?>
		</div>
		<div class="login-page">
			<div class="form">
				<h1>Login</h1>
				<p>Hello there.</p>
				<p>It's really nice to see you again!</p>
				<br>
				<?php
				if ($_SESSION['error'])
					echo "<p>" . $_SESSION['error'] . "</p>\n";
				$_SESSION['error'] = "";
				?>
				<form class="login-form" method="post" action="api/login.php">
					<input type="text" placeholder="Login" name="username" id="username" required/>
					<input type="password" placeholder="Password" name="password" id="password" required/>
					<button>login</button>
					<p class="message">Not Registered? <a href="register.php">Create an Account</a></p>
				</form>
			</div>
		</div>
	</body>
</html>
