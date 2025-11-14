<?php
require_once "../conexion.php";
session_start();
if($_SERVER["REQUEST_METHOD"] !== "GET"){
    header("Location: login.php");
    exit;
}
if(!isset($_SESSION["email"])){
    header("Location: login.php");
    exit;
}
$conn = new Conexion();
$sql = "DELETE FROM usuarios WHERE email=:email;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(":email", $_SESSION["email"], PDO::PARAM_STR);
$stmt->execute();
unset($_SESSION["email"]);
header("Location: login.php");
exit;

