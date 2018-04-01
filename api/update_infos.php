<?php
session_start();
include ('../backend/user.php');

if ($_SESSION['group'] === "admin") {
    header("Location: ../admin.php");
    exit;
}
if (($data = file_to_data(__DIR__ . PASSWD)) === FALSE) {
	exit ;
}
if ($_POST['new_pseudo'] && $_POST['new_password']) {
	foreach ($data as $k => $v) {
		if ($k === $_POST['new_pseudo']) {
			$data[$_SESSION['logged_on_user']] = $_POST['new_pseudo'];
			$data[$_POST['new_pseudo']] = $hash("whirlpool", $_POST['new_password']);
		}
		$_SESSION['logged_on_user'] = $_POST['new_pseudo'];
		header("Location: /index.php");
	}
}
?>
