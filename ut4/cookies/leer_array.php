<h1>Se ha leído la matriz</h1>
<?php

if(isset($_COOKIE["matriz"])){
    $matriz = json_decode($_COOKIE["matriz"]);
    echo "<pre>";
    print_r($matriz);
    echo "</pre>";
}