<?php
require_once "conexion.php";

$conn = new Conexion();

$q = $conn->prepare("SELECT nombre FROM usuario WHERE nombre = :nombre");
$nombre = "Menganito";
$q->bindParam(":nombre", $nombre, PDO::PARAM_STR);
$nombre = "Jaimito";
$q->execute();
$results = $q->fetchAll(PDO::FETCH_ASSOC);
if($results){
    echo "<pre>";
    print_r($results);
    echo "</pre>";
}else{
    echo "No hay resultados para el nombre $nombre";
}