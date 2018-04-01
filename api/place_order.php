<?php
@session_start();

include_once(__DIR__ . "/../backend/general.php");

if (!$_SESSION['logged_on_user']) {
	header("Location: ../login.php");
	exit();
}

if ($_SESSION['basket'] && ($data = file_to_data(__DIR__ . PRODUCT))) {
	$tmp = array();
	$tmp[0] = $_SESSION['logged_on_user'];
	$tmp[1] = time();
	foreach ($_SESSION['basket'] as $k) {
		if ($data[$k]['quantity'] == 0)
			continue;
		$data[$k]['quantity']--;
		array_push($tmp, $k);
	}
	$_SESSION['basket'] = array();
	$_SESSION['total'] = 0;

	if (count($tmp) <= 2 || ($orders = file_to_data("../private/order")) === FALSE) {
		header("Location: ../index.php");
		exit ;
	}
	array_push($orders, $tmp);
	data_to_file($orders, "../private/order");
}
header("Location: ../index.php");

?>
