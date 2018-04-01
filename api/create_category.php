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
    header("Location: index.php");
    exit;
} else {
    if ($_POST["name"]) {
        if (isset($_POST['visibility'])) {
            add_category($_POST["name"], true);
        } else {
            add_category($_POST["name"], false);
        }
        header("Location: admin.php");
        exit;
    }
    header("HTTP/1.1 405 Method Not Allowed");
}
?>
