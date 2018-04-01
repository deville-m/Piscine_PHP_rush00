<?php

session_start();
include '../backend/user.php';

remove_user($_SESSION['logged_on_user']);
session_destroy();
header("Location: /index.php");

?>
