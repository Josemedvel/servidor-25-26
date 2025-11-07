<?php
require_once "conexion.php";

$conn = new Conexion();
$q = $conn->query("SELECT * FROM usuario");
while($stmt = $q->fetch(PDO::FETCH_ASSOC)){
    echo "<pre>",
    print_r($stmt);
    echo "</pre>";
}
 