<?php
require_once "../conexion.php";
session_start();

function comprobar_cadena($var)
{
    if (htmlspecialchars(trim($var)) != "") {
        return htmlspecialchars(trim($var));
    } else {
        header("Location: registro.php");
        exit;
    }
}

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    echo '<form action="" method="post">';
    echo '<p>Contraseña actual: <input type="password" name="pass_actual"></p>';
    echo '<p>Contraseña nueva: <input type="password" name="pass_nueva"></p>';
    echo '<input type="submit" value="Cambiar contraseña">';
    echo '</form>';
} else {
    if (isset($_POST["pass_actual"], $_POST["pass_nueva"])) {
        $pass_actual = comprobar_cadena($_POST["pass_actual"]);
        $pass_nueva = comprobar_cadena($_POST["pass_nueva"]);
        
        try{
            $conn = new Conexion();
            $sql = "SELECT email, password FROM usuarios WHERE email=:email;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":email", $_SESSION["email"], PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                if(password_verify($pass_actual, $result["password"])){
                    $sql_upd = "UPDATE usuarios SET password = :password WHERE email = :email";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(":email", $_SESSION["email"], PDO::PARAM_STR);
                    $stmt->bindValue(":password", $pass_nueva, PDO::PARAM_STR);
                    $stmt->execute();
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
    }
}
