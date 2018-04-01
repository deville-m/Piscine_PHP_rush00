<?php
session_start();

include_once ('../backend/database.php');

if ($_SESSION['group'] != "admin") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: ../index.php");
    exit;
}
else if ($_POST["name"] && $_POST["price"] && $_POST["quantity"] && $_POST["image"]) {
    if (isset($_POST["visible"]))
        $visible = true;
    else
        $visible = false;
    if (isset($_POST["maj"]))
        $maj = true;
    else
        $maj = false;
    if (!add_product($_POST["name"], $_POST["price"], $_POST["quantity"], $_POST["image"], $visible, $maj)) {
        header("Location: ../admin.php");
        exit;
    }
    $list = get_data_key_list(__DIR__ . CATEGORY);
    foreach ($list as $kat) {
        if (isset($_POST[$kat])) {
            add_product_to_category($kat, $_POST['name']);
        }
    }
    $data = file_to_data(__DIR__ . PRODUCT);
    header("Location: ../admin.php");
	exit ;
}
header("HTTP/1.1 405 Method Not Allowed");
?>
