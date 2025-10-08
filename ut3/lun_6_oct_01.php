<?php
$form = '<form action="#" method="post">
    <p>Nombre:<input type="text" name="nombre" placeholder="Ingresa tu nombre"></p>
    <input type="submit" value="Enviar">
    </form>';

if(isset($_POST["nombre"])){
    if(mb_strlen(htmlspecialchars(trim($_POST["nombre"]))) >= 3){ // ok
        $nombre = htmlspecialchars(trim($_POST["nombre"]));
        echo "<h1>Buenas $nombre</h1>";
    }else{ // error: existe el nombre, pero su longitud es < 3
        $error = "<h1>el nombre no tiene 3 letras o más</h1>";
        echo $form;
        echo $error;
    }
}else{
    echo $form;
}
