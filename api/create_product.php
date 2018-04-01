<?php
session_start();

include_once ('../backend/database.php');

/*
 * @author ctrouill
 * @input name
 * @input visibility
 */
if ($_SESSION['group'] != "admin") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: ../index.php");
    exit;
}
else if ($_POST["name"] && $_POST["price"] && $_POST["quantity"] && $_POST["image"]) {
        if (!add_product($_POST["name"], $_POST["price"], $_POST["quantity"], $_POST["image"], isset($_POST['visibility']), isset($_POST["maj"]))) {
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
else {
    header("HTTP/1.1 405 Method Not Allowed");
}
?>
