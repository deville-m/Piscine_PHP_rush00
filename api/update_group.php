<?php

session_start();
include ('../backend/user.php');

/*
 * @author ctrouill
 * @docs delete user
 */
if ($_SESSION['group'] != "admin") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: ../index.php");
    exit;
}
if (!$_POST["group"] || !$_POST["user"] || ($data = file_to_data(__DIR__ . PASSWD)) === FALSE)
	exit;
if (!$data[$_POST["user"]])
	exit;
if ($_POST["group"] === "client")
	$data[$_POST["user"]] = "client";
if ($_POST["group"] === "admin")
	$data[$_POST["user"]] = "admin";
else
	exit();
header("Location: ../admin.php");
}

?>