<head>
    <title>Página con nav</title>
    <style>
        * {
            margin:0;
            padding:0;
        }
        nav ul{
            list-style: none;
            display: flex;
            align-items: center;
        }
        a{
            padding: <?php echo "5px"?>;
            text-decoration: none;
            color: #ccc;
        }
    </style>
</head>
<body>
    <?php
        include("header.html");
    ?>
    <h2>Tu página de referencia para lo que estás buscando</h2>
    <?php
        $a = "Bienvenido";
        $b = "Julián";
        // echo "<p>$a $b</p>";
    ?>
    <p <?php echo "style='background-color:red;border:1px solid black;'"?>>
        <?=var_dump($a)?> <?=$b?>
    </p>
</body>

