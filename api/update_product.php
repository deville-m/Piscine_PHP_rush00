<?php
session_start();

include '../backend/database.php';

/*
 * @author ctrouill
 */
if ($_SESSION['group'] != "admin") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: ../index.php");
    exit;
} else {
	header("Location: ../admin.php");
    exit;
}
?>
