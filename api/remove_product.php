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
for ($i = 0; $i < count($category); $i++) {
	for ($j = 0; $j < count($category[$i]['product']); $j++) {
		if ($category[$i]['product'][$j] === $_POST['product'] && isset($category[$i]['product'][$j]))
			unset($category[$i]['product'][$j]);
	}
}
#remove_product($_POST['product']);
#header("Location: ../admin.php");

?>