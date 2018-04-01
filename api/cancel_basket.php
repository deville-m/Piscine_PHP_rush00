<?php 

@session_start();

$_SESSION['basket'] = array();
$_SESSION['total'] = 0;
header("Location: ../index.php");

?>