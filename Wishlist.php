<?php
session_start();
require("db.php");
if (empty($_SESSION["username"])) {
    header("location:login.php");
    exit;
}

?>