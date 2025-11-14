<?php
require_once "../conexion.php";
session_start();

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    header("Location: login.php");
    exit;
}
function comprobar_cadena($var){
    if(htmlspecialchars(trim($var)) != ""){
            return htmlspecialchars(trim($var));
        }else{
            header("Location: login.php");
            exit;
        }
}

if(isset($_POST["email"], $_POST["password"])){
    $email = comprobar_cadena($_POST["email"]);
    $password = comprobar_cadena($_POST["password"]);
    try{
        $conn = new Conexion();
        $sql = "SELECT email, password FROM usuarios WHERE email=:email;";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){ // hay registro con ese email
            if(password_verify($password, $result["password"])){ // las contraseñas coinciden
                $sql_upd = "UPDATE usuarios SET fecha_ult_inicio_sesion = NOW() WHERE email = :email;";
                $stmt = $conn->prepare($sql_upd);
                $stmt->bindValue(":email", $email, PDO::PARAM_STR);
                $stmt->execute();
                $_SESSION["email"] = $email;
                header("Location: datos.php");
                exit;
            }
        }
        header("Location: login.php");
        exit;
    }catch(PDOException){
        header("Location: login.php");
        exit;
    }
}else{
    header("Location: login.php");
    exit;
}