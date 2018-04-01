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
    if (isset($_POST["maj"]))
        $overwrite = true;
    else
        $overwrite = false;
    if ($_POST["name"]
        && $_POST["price"]
        && $_POST["quantity"]
        && $_POST["image"]) {
        if (isset($_POST['visibility'])) {
            add_product($_POST["name"], $_POST["price"], $_POST["quantity"], $_POST["image"], true, $overwrite);
        } else {
            add_product($_POST["name"], $_POST["price"], $_POST["quantity"], $_POST["image"], true, $overwrite);
        }
        $list = get_data_key_list(__DIR__ . CATEGORY);

        foreach ($list as $kat) {
            if (isset($_POST[$kat]))
                add_product_to_category($kat, $_POST['name']);
        }
        header("Location: ../admin.php");
        exit;
    }
    header("HTTP/1.1 405 Method Not Allowed");
}
?>
