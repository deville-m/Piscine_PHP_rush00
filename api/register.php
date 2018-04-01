<?php

include(__DIR__ . "/../backend/user.php");

@session_start();

$_SESSION['error'];

if (!isset($_POST) || !isset($_SESSION)) {
	header("Location: ../register.php");
	$_SESSION['error'] = "Not in valid sesssion\n";
	exit();
}
if (!$_POST["username"] || !$_POST["password"]) {
	header("Location: ../register.php");
	$_SESSION['error'] = "Username or password invalid\n";
	exit();
}
if (($data = file_to_data(__DIR__ . PASSWD)) === FALSE || isset($data[$_POST['username']])) {
	header("Location: ../register.php");
	$_SESSION['error'] = "Username already exists\n";
	exit();
}

if (add_user($_POST['username'], $_POST['password'], "client") === FLASE) {
	header("Location: ../register.php");
	$_SESSION['error'] = "Could not create account\n";
	exit();
}

header("Location: ../index.php");
$_SESSION['logged_on_user'] = $_POST['username'];
$_SESSION['group'] = "client";

?>
