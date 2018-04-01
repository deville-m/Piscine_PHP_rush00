<?php
/*
 * @author ctrouill
 * @docs delete kateg0r13s
 */
if ($_SESSION['group'] != "admin") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: ../index.php");
    exit;
} else {
    if ($_POST["liste"]) {
        remove_user($_POST['liste'])
        header("Location: ../admin.php");
        exit;
    }
    header("HTTP/1.1 405 Method Not Allowed");
}
?>
