<?php
require_once "conexion.php";
//use Conexion;

class Usuario{
    private int $id;
    private string $name;

    public function __construct(int $id, string $name){
        $this->id = $id;
        $this->name = $name;
    }

    public function __toString(){
        return "USUARIO: [$this->id], Nombre: $this->name";
    }
}


$conn = new Conexion();
$q = $conn->query("
    CREATE TABLE IF NOT EXISTS usuario(
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(40) NOT NULL
    );
");
$q->execute();

/*$q2 = $conn->query("
    INSERT INTO usuario(nombre) VALUES('Jaimito'),('Menganito'), ('Laurita');
");
*/

$q3 = $conn->query("
    SELECT * FROM usuario;
");

$results = $q3->fetchAll(PDO::FETCH_ASSOC);

$users = [];

if($results){
    echo "<p>éxito en la consulta, hay ". count($results)." registros</p>";
    foreach($results as $user){
        $users[] = new Usuario($user["id"], $user["nombre"]);
    }
}else{
    echo "<p>La tabla está vacía</p>";
}


echo "<pre>";
print_r($results);
echo "</pre>";

foreach($users as $user){
    echo $user . "<br>";
}