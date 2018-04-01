<?php

@session_start();

include (__DIR__ . "/../backend/database.php");

if ($_SESSION['group'] !== "admin") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: ../index.php");
    exit;
}
if ($_POST['submit'] !== "OK" || !$_POST['product']) {
	header("HTTP/1.1 405 Method Not Allowed");
	header("Location: ../admin.php");
	exit();
}
if (($category = file_to_data(__DIR__ . CATEGORY)) === FALSE)
	exit(); 
foreach ($category as $val) {
	if (isset($val['product'][$_POST['product']]))
		unset($val['product'][$_POST['product']]);
}
remove_product($_POST['product']);
header("Location: ../admin.php");

?>