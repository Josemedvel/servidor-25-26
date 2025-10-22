<?php
// no hay session_start()
// que esté la cookie y no esté el post -> visita futura
if(isset($_COOKIE["nombre"]) && !isset($_POST["nombre"])){
    $nombre = htmlspecialchars(trim($_COOKIE["nombre"]));
    echo "<h1>Bienvenido de nuevo $nombre</h1>";
}elseif(isset($_COOKIE["nombre"]) && isset($_POST["nombre"])){ // existe cookie, existe post -> cambio de nombre
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    setcookie("nombre", $nombre, time() + 3600);
    echo "<h1>Me gusta el cambio de nombre, $nombre</h1>";
}elseif(!isset($_COOKIE["nombre"]) && isset($_POST["nombre"])){ // no existe cookie, existe POST -> el primer envío del form
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    setcookie("nombre", $nombre, time() + 3600);
    echo "<h1>Bienvenido $nombre</h1>";
}else{
    echo "<h1>Inicia sesión</h1>";
}

?>
<form action="" method="post">
    Nombre: <input type="text" name="nombre">
    <br>
    <input type="submit" value="Enviar">
</form>
