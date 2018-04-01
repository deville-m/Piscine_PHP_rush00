<?php

include (__DIR__ . "/../backend/general.php");

if (!$_POST['liste'] && !$_POST['liste2']) {
	header("Location: ../admin.php");
	exit();
}

if (($prod = file_to_data(__DIR__ . PRODUCT)) === FALSE){
	header("Location: ../admin.php");
	exit();
}
if (($cate = file_to_data(__DIR__ . CATEGORY)) === FALSE){
	header("Location: ../admin.php");
	exit();
}
if ($_POST["liste"])
	$prod[$_POST["liste"]]["visible"] = true;
if ($_POST["liste2"])
	$cate[$_POST["liste2"]]["visible"] = true;
if (!data_to_file($prod, __DIR__ . PRODUCT) === FALSE){
	header("Location: ../admin.php");
	exit();
}
if (!data_to_file($cate, __DIR__ . CATEGORY) === FALSE){
	header("Location: ../admin.php");
	exit();
}
header("Location: ../admin.php");

?>
