<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .cartas{
            display:flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>
<body>
    <?php
        require_once "conexion.php";
        $conn = new Conexion();
        $q = $conn->query("SELECT * FROM usuario");
        $results = $q->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="cartas">
<?php foreach($results as $p):?>
        <div class="card" style="width: 18rem; margin:5px;">
            <img src="https://thispersondoesnotexist.com/" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> <?php echo $p["nombre"]?></h5>
                <a href="#" class="btn btn-primary">Like</a>
            </div>
        </div>

    <?php endforeach;?>
    </div>
    

</body>
</html>