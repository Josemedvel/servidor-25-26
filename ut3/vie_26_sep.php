<?php
$carne = "C";
/*
// IF normal
if($carne == "A"){
    echo "<p>Puedo llevar motos grandes</p>";
}elseif($carne == "A2"){
    echo "<p>Puedo llevar motos medianas</p>";
}elseif($carne == "A1"){
    echo "<p>Puedo llevar motos pequeñas</p>";
}elseif($carne == "AM"){
    echo "<p>Puedo llevar una batidora con ruedas</p>";
}else{
    echo "<p>Me toca andar</p>";
}*/


?>

<!-- IF para renderizado-->
<?php if ($carne == "A"): ?>
    <p>Puedo llevar motos grandes</p>
    <img src="https://www.motociclismo.es/uploads/s1/12/08/91/98/cual-es-la-cilindrada-mas-grande-en-motos-hasta-la-fecha.jpeg" width="400">
<?php elseif ($carne == "A2"): ?>
    <p>Puedo llevar motos medianas</p>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmV1b7o5vNorzvFSziPIfc5bOTKEXXIcMDAQ&s" width="400">
<?php elseif ($carne == "A1"): ?>
    <p>Puedo llevar motos pequeñas</p>
    <img src="https://a.mcdn.es/mnet/contents/media/resources/2022/6/1193272.jpg" width="400">
<?php elseif ($carne == "AM"): ?>
    <p>Puedo llevar tostadoras con ruedas</p>
    <img src="https://www.repsol.es/content/dam/repsol-ecommerce/tienda/productos/m/moto-correpasillos-minnie-mouse-twin-dessert-rosa/moto-correpasillos-minnie-mouse-twin-dessert-rosa-001.jpg" width="400">
<?php else: ?>
    <p>Me toca andar</p>
    <img src="https://img.freepik.com/foto-gratis/retrato-exterior-hombre-negro_23-2149645855.jpg?semt=ais_hybrid&w=740&q=80" width="400">
<?php endif; ?>

<?php
// SWITCH normal
$hambre = "baja";

/*switch($hambre){
    case "baja":
        echo "<p>Pincho tortilla</p>";
        break;
    case "media":
        echo "<p>Bocata calamares</p>";
        break;
    case "alta":
        echo "<p>Magro adobado + Bocata</p>";
        break;
    case "extrema":
        echo "<p>Patatas bravioli + Magro + Bocata</p>";
        break;
    default:
        echo "<p>tomate una cerveza y vuelve a preguntar</p>";
}*/
?>
<!--SWITCH RENDERIZADO -->
<?php switch($hambre): ?>
<?php case "baja": ?>
    <p>Pincho tortilla</p>
    <?php break;?>
<?php case "media": ?>
    <p>Bocata calamares</p>
    <?php break;?>
<?php case "alta": ?>
    <p>Magro adobado + Bocata</p>
    <?php break;?>
<?php case "extrema": ?>
    <p>Patatas bravioli + Magro + Bocata</p>
    <?php break;?>
<?php default: ?>
    <p>tomate una cerveza y vuelve a preguntar</p>
<?php endswitch; ?>

<?php
$eleccion = match($hambre){
    "baja" => "<p>Pincho tortilla</p>",
    "media" => "<p>Bocata calamares</p>",
    "alta" => "<p>Magro adobado + Bocata</p>",
    "extrema" => "<p>Patatas bravioli + Magro + Bocata</p>",
    default => "<p>tomate una cerveza y vuelve a preguntar</p>"
};
echo "<br>";
echo $eleccion;
?>
<form action="form_26.php" method="get">
    <label for="nombre">Ingrese su nombre:</label>
    <input type="text" id="nombre" name="nombre">
    <br>
    <input type="submit" value="Enviar formulario">
    <!--<button type="submit"></button>-->
</form>

