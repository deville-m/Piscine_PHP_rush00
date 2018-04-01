<?php

@session_start();

include (__DIR__ . "/../backend/general.php");
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
if (($data = file_to_data(__DIR__ . CATEGORY)) === FALSE)
	exit();

foreach ($data as $key => $value) {
	for ($j = 0; $j < count($data[$key]['product']); $j++) {
		if ($data[$key]['product'][$j] === $_POST['product'])
			unset($data[$key]['product'][$j]);
	}
	$data[$key]['product'] = array_values($data[$key]['product']);
}
if (data_to_file($data, __DIR__ . CATEGORY) === FALSE)
	exit();

remove_product($_POST['product']);
header("Location: ../admin.php");

?>
