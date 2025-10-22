<?php
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["username"], $_POST["password"]) &&
     htmlspecialchars(trim($_POST["username"])) != "" &&
     htmlspecialchars(trim($_POST["password"]))){
        $username = htmlspecialchars(trim($_POST["username"]));
        $password = htmlspecialchars(trim($_POST["password"]));

        if($username === "batman" && $password === "1234"){ // formulario ok, datos ok
            setcookie("sesion", "iniciada", time() + 3600);
            header("Location: privada.php");
            exit;
        }else{
            $_SESSION["error"] = "El nombre de usuario y/o la contraseña son incorrectos";
            header("Location: login.php");
            exit;
        }


    }else{ // issets
        $_SESSION["error"] = "El nombre de usuario y/o la contraseña no se han enviado, o están vacíos";
        header("Location: login.php");
        exit;
    }
}else{ // GET
    header("Location: login.php");
    exit;
}