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
		<h1>Login</h1>
		<form class="login-form" method="post" action="api/login.php">
		  <input type="text" playceholder="username" name="username" id="username" required/>
		  <input type="password" placeholder="password" name="password" id="password" required/>
		  <button>login</button>
		  <p class="message">Not registered? <a href="register.php">Create an account</a></p>
		</form>
	  </div>
	</div>
  </body>
</html>
