<?php
session_start();
if(isset($_SESSION["nombre"]) && !isset($_POST["nombre"])){ //existe sesión, visita posterior
    $nombre =  htmlspecialchars(trim($_SESSION["nombre"]));
    echo "<h1>Bienvenido de nuevo $nombre</h1>";
}elseif(!isset($_SESSION["nombre"]) && isset($_POST["nombre"])){//al enviar el formulario por primera vez
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $_SESSION["nombre"] = $nombre;
    echo "<h1>Bienvenido $nombre</h1>";
}elseif(isset($_SESSION["nombre"]) && isset($_POST["nombre"])){//siguientes envíos del formulario
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $_SESSION["nombre"] = $nombre;
    echo "<h1>Buen cambio, me gusta $nombre</h1>";
}else{
    echo "<h1>Inicia sesión<h1>";
}
?>
<form action="#" method="post">
    Nombre: <input type="text" name="nombre">
    <button type="submit">Enviar</button>
</form>

