<?php

include_once(__DIR__ . "/../backend/general.php");

if (!isset($_POST['quantity']) || !isset($_POST['product'])) {
	header("Location: ../index.php");
	exit();
}
if (!isset($_SESSION['basket']))
	$_SESSION['basket'] = array();
if (($data = file_to_data(__DIR__ . PRODUCT)) === FALSE){
	header("Location: ../index.php" . $_SESSION['current_page']);
	exit();
}
if (!isset($data[$_POST['product']])) {
	echo $_POST['product']."\n";
	header("Location: ../index.php" . $_SESSION['current_page']);
	exit();
}
while ($_POST['quantity'] && $data[$_POST['product']]['quantity']) {
	array_push ($_SESSION['basket'], $_POST['product']);
	$_POST['quantity']--;
	$data[$_POST['product']]['quantity']--;
}

header("Location: ../index.php" . $_SESSION['current_page']);

?>
