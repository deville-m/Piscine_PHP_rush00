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
	if ($_POST['product']
		&& $_POST["name"]
        && $_POST["price"]
        && $_POST["quantity"]
        && $_POST["image"]) {
		if (isset($_POST['add'])) {
			/* todo: update product */
            /* add_product($_POST["name"], $_POST["price"], $_POST["quantity"], $_POST["image"], true); */
        } else {
			/* todo: update product */
            /* add_product($_POST["name"], $_POST["price"], $_POST["quantity"], $_POST["image"], true); */
        }
	}	
	header("Location: ../admin.php");
    exit;
}
?>
