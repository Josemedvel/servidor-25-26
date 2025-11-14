<?php
session_start();
if($_SERVER["REQUEST_METHOD"] !== "GET"){
    header("Location: login.php");
    exit;
}
if(!isset($_SESSION["email"])){
    header("Location: login.php");
    exit;
}
unset($_SESSION["email"]);
header("Location: login.php");
exit;

