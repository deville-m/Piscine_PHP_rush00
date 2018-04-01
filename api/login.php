<?php

include_once(__DIR__ . "/../backend/user.php");

@session_start();

$_SESSION['error'] = "";

if (!isset($_POST) || !isset($_SESSION)) {
	header("Location: ../login.php");
	$_SESSION['error'] = "Not in valid sesssion.\n";
	exit();
}
if (!$_POST["username"] || !$_POST["password"] || !auth($_POST["username"], $_POST['password'])) {
	header("Location: ../login.php");
	$_SESSION['error'] = "Username or password invalid.\n";
	exit();
}
header("Location: ../index.php");
$_SESSION['logged_on_user'] = $_POST['username'];
$_SESSION['group'] = get_user_group($_POST['username']);
?>