<?php
@session_start();

header("Location: ../index.php");
if ($_SESSION['basket'] && ($data = file_to_data(__DIR__ . PRODUCT)) !== FALSE) {
	$tmp = array();
	$tmp[0] = $_SESSION['logged_on_user'];
	foreach ($_SESSION['basket'] as $k) {
		if ($data[$k]['quantity'] == 0)
			continue;
		$data[$k]['quantity']--;
		array_push($tmp, $k);
	}
	$_SESSION['basket'] = array();
	$_SESSION['total'] = 0;
	if (empty($tmp) || !($orders = file_to_data("../private/order"))) {
		exit ;
	}
	array_push($order, $tmp);
	if (!(data_to_file($order, "../private/order"))) {
		exit ;
	}
}

?>
