<?php
require_once "../conexion.php";
session_start();
if($_SERVER["REQUEST_METHOD"] !== "POST"){
    header("Location: registro.php");
    exit;
}
function comprobar_cadena($var){
    if(htmlspecialchars(trim($var)) != ""){
            return htmlspecialchars(trim($var));
        }else{
            header("Location: registro.php");
            exit;
        }
}
if(isset($_POST["name"], $_POST["lastname"], $_POST["email"], $_POST["password"])){ // existen las claves
    $nombre = comprobar_cadena($_POST["name"]);
    $apellidos = comprobar_cadena($_POST["lastname"]);
    $email = comprobar_cadena($_POST["email"]);
    $passwords = $_POST["password"];
    if(count($passwords) !== 2){ // que haya exactamente 2
        header("Location: registro.php");
        exit;
    }
    if($passwords[0] !== $passwords[1]){ // que sean iguales
        header("Location: registro.php");
        exit;
    }
    $password = comprobar_cadena($passwords[0]); // que no estén vacías

    try{
        $conn = new Conexion();
        $sql = "INSERT INTO usuarios (nombre, apellidos, email, password) VALUES (:nombre, :apellidos, :email, :password)";
        $stmt = $conn->prepare($sql);
        // bindear valores
        $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindValue(":apellidos", $apellidos, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $pass_hasheada = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindValue(":password", $pass_hasheada, PDO::PARAM_STR);
        $stmt->execute();

        $_SESSION["email"] = $email;
        header("Location: datos.php");
        exit;

    }catch(PDOException){
        header("Location: registro.php");
        exit;
    }
} else{
    header("Location: registro.php");
    exit;
}