<?php
session_start();
include_once ('../backend/user.php');

if ($_SESSION['group'] === "admin") {
    header("Location: ../admin.php");
    exit;
}
if (($data = file_to_data(__DIR__ . PASSWD)) === FALSE) {
	header("Location: ../index.php");
	exit ;
}
if ($_POST['new_pseudo'] && $_POST['new_password']) {
	add_user($_POST['new_pseudo'], $_POST['new_password'], "client");
	remove_user($_SESSION['logged_on_user']);
	$_SESSION['logged_on_user'] = $_POST['new_pseudo'];
	header("Location: /index.php");
}
?>
