<?php
session_start();
if(isset($_COOKIE["datos"])){
    $datos = json_decode($_COOKIE["datos"], true);
    unset($_SESSION["error"]);
    echo "<h1>Buenas, tu IMC es de ".$datos["IMC"]." y tu TMB es de ". $datos["TMB"] ."</h1>";
}else{
    $_SESSION["error"] = "La cookie ha caducado, vuelve a ingresar los datos en el formulario";
    header("Location: formulario.php");
    exit;
}