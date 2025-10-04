<?php

if(isset($_POST["nombre"], $_POST["password"]) && htmlspecialchars(trim($_POST["nombre"])) != "" && htmlspecialchars(trim($_POST["password"])) != ""){

echo "<h1>Hola buenas " . htmlspecialchars(trim($_POST['nombre'])).", tu contraseña es " . htmlspecialchars(trim($_POST['password'])) ."</h1>";
}else{
    echo "No has enviado el formulario, vuelve a la página de formulario";
    echo "<a href='formulario_001.html'>Volver a la página de formulario</a>";
}
