<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Es jueves</title>
</head>
<body>
    <?php
    include("constantes.php");
    include_once("header.html");

    echo "<p>hola adios<p>";
    echo NOMBRE_VEHICULO ."<br>";
    echo PI . "<br>";
    echo "<br> $chofer";
    $chofer = "Alba";
    echo "<br> $chofer";
    include_once("header.html");
    $arr = array(1,2,3,7,6,5,4,3);
    $arr[] = 7;
    print_r($arr);
    echo "<br>";
    $tablero = array();
    $tablero[] = array("","","");
    $tablero[] = array("","");
    $tablero[] = array("","","");

    print_r($tablero);

    $tablero_2 = [];
    $tablero_2[] = ["X", "X", "O"];
    $tablero_2[] = ["X", "O", "X"];
    $tablero_2[] = ["O", "X", "O"];
    print_r($tablero_2);
    echo "<br>";
    echo "<h1> {$tablero_2[1][2]} </h1>";
    print_r($GLOBALS);
    echo "<br>";
    $GLOBALS["coche"] = "Aston Martin";
    print_r($GLOBALS);
    
    ?>
    <h1><?=$tablero_2[1][2]?></h1>
    <h1><?php echo $tablero_2[1][2];?></h1>
    
</body>
</html>