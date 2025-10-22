<?php
session_start();
if(isset($_SESSION["peso"], $_SESSION["altura"], $_SESSION["sexo"], $_SESSION["edad"])){
    $peso = doubleval($_SESSION["peso"]);
    $altura = doubleval($_SESSION["altura"]);
    $sexo = $_SESSION["sexo"];
    $edad = doubleval($_SESSION["edad"]);
}else{
    $peso = "";
    $altura = "";
    $sexo = "";
    $edad = "";
}
?>

<form action="procesamiento_form.php" method="post">
    <p>Peso(Kg) <input type="text" name="peso" value=<?=$peso?>></p>
    <p>Altura(cm) <input type="number" name="altura" value=<?=$altura?>></p>
    <p>Sexo </p>
    <p>Hombre: <input type="radio" name="sexo" value="H" <?php if($sexo == "H"){echo "checked";}?> > Mujer: <input type="radio" name="sexo" value="M" <?php if($sexo == "M"){echo "checked";}?>></p>
    <p>Edad: <input type="number" name="edad" value=<?=$edad?>></p>
    <input type="submit" value="Enviar">
</form>
<?php
    if(isset($_SESSION["error"])){
        echo "<h2 style='color:red;'>".$_SESSION["error"]."</h2>";
    }
?>