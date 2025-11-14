<?php
require_once "../conexion.php";
session_start();
if(!isset($_SESSION["email"])){
    header("Location: login.php");
    exit;
}
?>
<h1>Bienvenido a tu página de datos</h1>
<?php
    $sql = "SELECT * FROM usuarios WHERE email=:email;";
    $conn = new Conexion();
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":email", $_SESSION["email"], PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC); // array asociativa con las claves
?>
<p>Nombre: <?= $results["nombre"]?></p>
<p>Apellidos: <?= $results["apellidos"]?></p>
<p>Email: <?= $results["email"]?></p>
<p>Fecha registro: <?= $results["fecha_registro"] ?></p>

<a href="editar_perfil.php"><button>Editar perfil</button></a>
<a href="cambiar_contrasenna.php"><button>Cambiar contraseña</button></a>
<a href="eliminar_cuenta.php"><button>Eliminar cuenta</button></a>
<a href="cerrar_sesion.php"><button>Cerrar sesión</button></a>
