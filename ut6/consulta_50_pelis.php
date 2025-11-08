<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once "conexion.php" ;

    $conn = new Conexion();

    $q = $conn->query("SELECT * FROM movie LIMIT 50");
    $resultados = $q->fetchAll(PDO::FETCH_ASSOC);

    function format_time($num){
        if($num > 9){
            return "$num";
        }else{
            return "0$num";
        }
    }

?>

    <table border="1px solid black">
        <tr>
            <th colspan="2">ID</th>
            <th>TÍTULO</th>
            <th>DURACIÓN</th>
            <th>LOCALE</th>
        </tr>
        <?php foreach($resultados as $peli):?>
            <tr>
                <td><?= $peli["id"]?></td>
                <td><a href="borrar_peli.php?id='<?=$peli["id"]?>'"><button>Borrar</button></a></td>
                <td><?= $peli["title"]?></td>
                <td><?php 
                    $minutos = $peli["runtime"];
                    $horas_con_resto = ($minutos / 60);
                    $horas_enteras = (int)($horas_con_resto);
                    $minutos = ($horas_con_resto - $horas_enteras) * 60;
                    echo format_time($horas_enteras) . ":" . format_time($minutos);
                
                
                ?></td>
                <td><?= $peli["locale"] ?? "desconocido"?></td>
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>



