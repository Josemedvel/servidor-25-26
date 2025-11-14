<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="procesar_registro.php" method="post">
        <p>
            Nombre: <input type="text" name="name" required> 
        </p>
        <p> Apellidos:
            <input type="text" name="lastname" required>
        </p>
        <p>
            Email:
            <input type="email" name="email" required>
        </p>
        <p>
            Contraseña:
            <input type="password" name="password[]" required>
        </p>
        <p>
            Repite la contraseña:
            <input type="password" name="password[]" required>
        </p>
        <input type="submit" value="Registrarme">
    </form>
    <br>
    <a href="inicio_sesion.php">Tengo cuenta</a>
</body>
</html>