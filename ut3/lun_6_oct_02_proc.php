<h1>hay texto</h1>

<?php
if(isset($_POST["nombre"])){
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    if(mb_strlen($nombre) >= 3 ){
        echo "<h1>Buenas $nombre</h1>";
    }else{
        echo "<h2 style='color:red;'>El nombre $nombre no tiene 3 o más caracteres,
         vuelva al formulario <a href='lun_6_oct_02_form.php'> IR A FORMULARIO</a></h2>";
    }
}else{ // si no se ha enviado el formulario
    header("Location: lun_6_oct_02_form.php");
    exit;
}