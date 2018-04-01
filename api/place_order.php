<?php
@session_start();
if ($_SESSION['basket']) {
	$tmp = array();
	$tmp[0] = $_SESSION['logged_on_user'];
	foreach ($_SESSION['basket'] as $k) {
		array_push($tmp, $k);
	}
	if (!($orders = file_to_data("../private/order"))) {
		exit ;
	}
	array_push($order, $tmp);
	if (!(data_to_file($order, "../private/order"))) {
		exit ;
	}
	$_SESSION['basket'] = array();
}
header("Location: /");
?>
