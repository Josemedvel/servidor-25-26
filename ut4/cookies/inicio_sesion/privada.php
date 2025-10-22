<?php
session_start();
if(!isset($_COOKIE["sesion"])){
        $_SESSION["error"] = "La sesión ha caducado, logueate de nuevo, por favor";
        header("Location: login.php");
        exit;
    }else{
        setcookie("sesion", "iniciada", time() + 10);
        if(isset($_SESSION["error"])){
            unset($_SESSION["error"]);
        }
    }
?>
<h1>Esta es la página privada</h1>
<p>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aut neque perspiciatis voluptatem? Accusamus quae quia ab pariatur laboriosam reprehenderit repellat architecto odio, est ipsum, officiis eaque et inventore vero.
</p>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur saepe nobis cum. Nesciunt corporis asperiores omnis dolores qui nobis fuga quidem, ea maxime accusantium, sapiente necessitatibus deleniti nulla natus obcaecati?</p>