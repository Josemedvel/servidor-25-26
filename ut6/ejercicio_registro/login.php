<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="procesar_login.php" method="post">
        <p>
            Email:
            <input type="email" name="email" required>
        </p>
        <p>
            Contraseña:
            <input type="password" name="password" required>
        </p>
        <input type="submit" value="Iniciar sesión">
    </form>
    <br>
    <a href="registro.php">Aun no tengo cuenta</a>
</body>
</html>