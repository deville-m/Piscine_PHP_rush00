<?php
@session_start();

include_once(__DIR__ . "/../backend/general.php");

if (!$_SESSION['logged_on_user']) {
	header("Location: ../login.php");
	exit();
}

if ($_SESSION['basket'] && ($data = file_to_data(__DIR__ . PRODUCT))) {
	$tmp = array();
	$tmp["user"] = $_SESSION['logged_on_user'];
	$tmp["timestamp"] = time();
	foreach ($_SESSION['basket'] as $k) {
		if ($data[$k]['quantity'] == 0)
			continue;
		$data[$k]['quantity']--;
		if (!isset($tmp[$k])) {
			$tmp[$k] = array();	
		}
		$tmp[$k][0] += $data[$k]['price'];
		$tmp[$k][1]++;
	}
	$_SESSION['basket'] = array();
	$_SESSION['total'] = 0;

	if (count($tmp) <= 2 || ($orders = file_to_data("../private/order")) === FALSE) {
		header("Location: ../index.php");
		exit ;
	}
	array_push($orders, $tmp);
	data_to_file($orders, "../private/order");
	data_to_file($data, "../private/product");
}
header("Location: ../index.php");
?>
