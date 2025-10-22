<?php
    session_start();
    if(isset($_SESSION["tema"]) && !isset($_POST["tema"])){
        $tema = htmlspecialchars(trim($_SESSION["tema"]));
        switch($tema){
            case "azul":
                $color = "#CEE5F2";
                $bkg_color = "#536B78";
                break;
            case "tierra":
                $color = "#8a5a44";
                $bkg_color = "#edc4b3";
                break;
            default:
                $color = "#685d57ff";
                $bkg_color = "#f5ebe0";
        }
    }else{
        if(isset($_POST["tema"]) && htmlspecialchars(trim($_POST["tema"])) != ""){
            $_SESSION["tema"] = htmlspecialchars(trim($_POST["tema"]));
            header("Refresh: 0");
        }else{
            $color = "#685d57ff";
            $bkg_color = "#f5ebe0";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            color: <?=$color?>;
            background-color: <?=$bkg_color?> ;
        }
    </style>
</head>
<body>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer placerat ornare ornare. Maecenas quis purus vel massa posuere blandit eget vitae nisl. Maecenas quis pellentesque ligula, quis ullamcorper justo. Pellentesque at hendrerit orci, vel dapibus urna. Pellentesque tellus velit, vehicula at molestie nec, faucibus quis orci. Sed eu est egestas ex pretium ornare at a felis. Nulla euismod quam quis sapien vehicula ultricies. Fusce tempus nulla quam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi fringilla lobortis lacus, eu dignissim dolor sagittis eget. Proin at libero volutpat, feugiat libero eget, egestas quam. Fusce justo nulla, ornare ut nunc at, bibendum faucibus diam. Nulla aliquet ipsum nulla, sed scelerisque sem bibendum ut. Donec varius, neque eu posuere blandit, nulla nisl vehicula odio, eget eleifend lorem dolor ac ligula. Praesent tempus lectus nec leo elementum congue.
    </p>
<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel orci placerat ante eleifend lobortis. Morbi at vulputate turpis, eget fermentum magna. Nam ut commodo mauris, eget pretium purus. Nunc bibendum convallis massa vel facilisis. Sed tincidunt rhoncus nunc sit amet aliquet. Vestibulum nisl mauris, varius quis laoreet vitae, finibus rhoncus nisl. Curabitur sit amet ipsum orci. Aenean dolor orci, eleifend vel orci eleifend, molestie tincidunt urna.
</p>
<p>Praesent euismod sapien id tristique convallis. Cras ut nisi at urna suscipit porttitor in nec elit. Sed vestibulum, ipsum eu venenatis laoreet, nunc nibh vulputate ante, in feugiat arcu ipsum a felis. Curabitur ac orci enim. Vestibulum rutrum, ipsum sit amet pellentesque bibendum, ex lacus luctus lorem, viverra laoreet leo leo eget leo. In iaculis lorem odio, non efficitur erat vehicula quis. Donec non porttitor turpis. Pellentesque elementum lacus nunc, at fermentum magna interdum non. Curabitur facilisis id ipsum id molestie. Proin metus massa, varius quis mauris sit amet, molestie venenatis dolor.
</p>
<p>Cras et nisi tristique, scelerisque ante quis, volutpat urna. Proin malesuada ipsum neque, non porta orci egestas ac. Donec ut pulvinar ligula. Donec vel nisl auctor, dapibus orci nec, suscipit velit. Phasellus tincidunt tincidunt nulla, sed ullamcorper neque tempor a. Pellentesque dui velit, posuere et rhoncus non, porta vel nibh. Mauris consectetur lorem id nulla scelerisque rutrum.
</p>
<p>Ut pellentesque tincidunt odio, nec porta lorem mattis a. Cras vitae luctus eros. In ac justo elit. Praesent nisl eros, suscipit nec ullamcorper eget, interdum a erat. Phasellus in mauris at felis suscipit bibendum et id nunc. Maecenas a dolor vitae ex sollicitudin scelerisque. Sed sit amet tempor purus, sit amet blandit massa. Proin at consequat arcu, eu semper dolor.
</p>
</body>
</html>