<?php
session_start();
$contador = 0;
if(isset($_SESSION["contador"])){
    $contador = $_SESSION["contador"];
}
if(isset($_POST["op"]) && htmlspecialchars(trim($_POST["op"])) != ""){
    $op = htmlspecialchars(trim($_POST["op"]));
    switch($op){
        case "+":
            $contador++;
            break;
        case "-":
            $contador--;
            break;
        default:
            break;
    }
    $_SESSION["contador"] = $contador;
}
?>

<form action="" method="post">
    <input type="submit" value="+" name="op">
    <span><b><?=$contador?></b></span>
    <input type="submit" value="-" name="op">
</form>