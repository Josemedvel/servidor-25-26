<?php
require_once "../conexion.php";

$conn = new Conexion();

$sql = "CREATE TABLE IF NOT EXISTS usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(256) UNIQUE NOT NULL,
    password VARCHAR(256) NOT NULL,
    fecha_registro DATETIME DEFAULT NOW() NOT NULL,
    fecha_ult_inicio_sesion DATETIME DEFAULT NOW() NOT NULL
);
";

$stmt = $conn->query($sql); // se ejecuta sola
