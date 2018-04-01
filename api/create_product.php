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
        && $_POST["image"]) {
        // && $_POST["list"]) {
        if (isset($_POST['visibility'])) {
            add_product($_POST["name"], $_POST["price"], $_POST["quantity"], $_POST["image"], true);
        } else {
            add_product($_POST["name"], $_POST["price"], $_POST["quantity"], $_POST["image"], true);
        }
        foreach ($_POST['list'] as $kat) {
            add_product_to_category($kat, $_POST['name']);
        }
        header("Location: ../admin.php");
        exit;
    }
    header("HTTP/1.1 405 Method Not Allowed");
}
?>
