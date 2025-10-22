<?php
    session_start();
    if(isset($_SESSION["error"]) && $_SESSION["error"] != ""){
        $error = $_SESSION["error"];
    }
?>

<form action="proceso_form.php" method="post">
    Nombre de usuario: <input type="text" name="username">
    <br>
    Contraseña: <input type="password" name="password">
    <br>
    <input type="submit" value="Login">
</form>
<?php
    if(isset($error)){
        echo "<h2 style='color:red;'>$error</h2>";
    }
?>