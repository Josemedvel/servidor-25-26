<?php
$matriz = [
    [4,1,3],
    [5,7,8],
    [1,2,8]
];
setcookie("matriz", json_encode($matriz), time() + 3600);
?>
<h1>Se ha guardado la matriz</h1>