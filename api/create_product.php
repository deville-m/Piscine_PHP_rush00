<?php
session_start();

include '../backend/database.php';

/*
 * @author ctrouill
 * @input name
 * @input visibility
 */
if ($_SESSION['group'] != "admin") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: ../index.php");
    exit;
} else {
    if ($_POST["name"]
        && $_POST["price"]
        && $_POST["quantity"]
        && $_POST["list"]) {
        if (isset($_POST['visibility'])) {} else {}
        header("Location: ../admin.php");
        exit;
    }
    header("HTTP/1.1 405 Method Not Allowed");
}
?>
