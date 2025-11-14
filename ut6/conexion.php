<?php
class Conexion{
    private string $destino = "mysql:host=localhost:3306;dbname=ejercicio_login;charset=utf8mb4"; // ajustad a vuestra base de datos
    private string $user = "root"; // ajustad a vuestra base de datos
    private string $password = "1234"; // ajustad a vuestra base de datos
    private PDO $conn;
    public function __construct(){
        try {
            // Crear conexión PDO
            $this->conn = new PDO($this->destino, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conectado!!<br>";
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage()."<br>";
        }
    }
    // con este método en principio os vale para lanzar todos los métodos vistos,
    // aunque si queréis usar los wrapper que hay debajo lo podéis hacer
    public function getConexion(): PDO {
        return $this->conn;
    }
    
    public function query($sql){
        return $this->conn->query($sql);
    }

    public function prepare($sql){
        return $this->conn->prepare($sql);
    }
}

?>