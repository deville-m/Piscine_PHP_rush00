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
		<!-- <form class="register-form"> -->
		<!--   <input type="text" placeholder="name"/> -->
		<!--   <input type="password" placeholder="password"/> -->
		<!--   <input type="text" placeholder="email address"/> -->
		<!--   <button>create</button> -->
		</form>
		<form class="login-form" method="post" action="api/register.php">
		  <input type="text" placeholder="username" name="username" id="username" required/>
		  <input type="password" placeholder="password" name="password" id="password" required/>
		  <input type="text" placeholder="foo@bar.com" name="email" id="email" required/>
		  <button>register</button>
		  <p class="message">Already registered? <a href="login.php">Sign In</a></p>
		</form>
	  </div>
	</div>
  </body>
</html>
