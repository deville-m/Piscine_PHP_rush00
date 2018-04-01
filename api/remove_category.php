<?php

include(__DIR__ . "/../backend/database.php");
@session_start();

if ($_SESSION['group'] !== "admin") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: ../index.php");
    exit;
} else {
    if ($_POST["category"]) {
        remove_category($_POST["category"]);
        header("Location: ../admin.php");
        exit;
    }
    header("HTTP/1.1 405 Method Not Allowed");
}
?>
