<?php
require("db.php");
session_start();
if (empty($_SESSION["username"])){
  header("location:login.php");
  exit;}
  $stmt = $db->prepare("DELETE FROM users where email = :email");
  $stmt->execute(["email"=>$_SESSION["email"]]);
  header("location:login.php");
  exit;
?>