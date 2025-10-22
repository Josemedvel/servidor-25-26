<?php
session_start();
if($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit;
    header("Location: formulario.php");
}

if(isset($_POST["peso"], $_POST["altura"], $_POST["edad"], $_POST["sexo"])){
    if(!is_numeric($_POST["peso"]) || !is_numeric($_POST["altura"]) || !is_numeric($_POST["edad"]) || ($_POST["sexo"] != "H" && $_POST["sexo"] != "M")){
        $_SESSION["error"] = "Los valores ingresados no son numéricos, hay 
        alguno vacío, o la edad no está comprendida entre 10 y 100, o la altura
            no está entre 120 y 250, o el sexo no está comprendido en (H, M)";
        header("Location: formulario.php");
        exit;
    }
    $peso = doubleval($_POST["peso"]);
    $altura = doubleval($_POST["altura"]);
    $sexo = $_POST["sexo"];
    $edad = doubleval($_POST["edad"]);

    $_SESSION["peso"] = $peso;
    $_SESSION["altura"] = $altura;
    $_SESSION["sexo"] = $sexo;
    $_SESSION["edad"] = $edad;
    
    if($sexo == "H"){
        $TMB = (10 * $peso) + (6.25 * ($altura/100)) - (5 * $edad) + 5;
    }else{
        $TMB = (10 * $peso) + (6.25 * ($altura/100)) - (5 * $edad) - 161;
    }

    $IMC = round($peso / (($altura/100) ** 2), 2);
    $datos = ["TMB" => $TMB, "IMC" => $IMC];
    setcookie("datos", json_encode($datos), time() + 24 * 3600 * 3);
    unset($_SESSION["error"]);
    header("Location: resultados.php");
    exit;
}



?>