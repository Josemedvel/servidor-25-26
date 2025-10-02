<?php
/*
$arr_num_1 = [1=>2, "0"=>1];
$arr_num_2 = [0=>1, 1=>2];
$arr_txt_1 = ["alumno_1" => "Iván", "alumno_2" => "Ana"];
$arr_txt_2 = ["alumno_1" => "Víctor", "alumno_4" => "María"];
$arr_num = [];

for($i = 1; $i <= 100; $i++){
    $arr_num []= $i;
}

print_r($arr_txt_2 + $arr_txt_1);
echo "<br>";
var_dump($arr_num_1 == $arr_num_2);
var_dump($arr_num_1 === $arr_num_2);

$arr_vacia = [];

for($i = 0; $i < 10; $i++){
    if($i % 2 == 0){
        array_unshift($arr_vacia, $i);
    }else{
        array_push($arr_vacia, $i);
    }
}

print_r($arr_vacia);

echo "<br>";

while(count($arr_vacia) != 0){
    if(count($arr_vacia) % 2 == 0){
        $num = array_pop($arr_vacia);
    } else{
        $num = array_shift($arr_vacia);
    }
    echo "$num <br>";    
}
echo "<br>";

$claves = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];
$valores = ["macarrones", "paella", "ensalada", "merluza", "pizza", "filete", "tortilla"];
$arr_menu = array_combine($claves, $valores);
print_r($arr_menu);

$nuevas_claves = array_map(fn ($e) => "dia ". $e , $claves);

$suma_mil = array_reduce($arr_num, fn ($i,$e) => $i + $e, 0);

print_r($nuevas_claves);
echo "<br>";
echo "$suma_mil<br>";


$array_hasta_10 = [1,2,3,4,5,6,7,8,9,10];
$subarray = array_splice($array_hasta_10, 3, 4);
$nueva_array_splice = array_splice($subarray, 0, 1, [[4,5,6]]);
print_r($array_hasta_10);
echo "<br>";
print_r($subarray);
echo "<br>";
print_r($nueva_array_splice);

$baraja = [];
$palos = ["bastos", "espadas", "oros", "copas"];
for($p = 0; $p < count($palos); $p++){
    for($c = 1; $c <= 7; $c++){
        $baraja []= "$c de $palos[$p]";
    }
    $baraja []= "sota de $palos[$p]";
    $baraja []= "caballo de $palos[$p]";
    $baraja []= "rey de $palos[$p]";
}

print_r($baraja);
echo "<br>";
$baraja_barajada = [];
while(count($baraja) > 0){
    $carta_a_sacar = rand(0, count($baraja) - 1);
    $baraja_barajada []= array_splice($baraja, $carta_a_sacar, 1)[0];
}
echo "<br>";
print_r($baraja_barajada);

$tres_en_raya = [["X","X","O"],
                ["O","X","O"],
                ["O","X","O"]];
echo "<pre>";
print_r($tres_en_raya);
echo "</pre>";

echo "<br>";
foreach($tres_en_raya as $fila){
    foreach($fila as $col){
        echo "$col\t";
    }
    echo "<br>";
}
*/

function suma_numeros(... $numeros){
    return array_reduce($numeros, fn($i, $e) => $i + $e, 0);
}
echo suma_numeros(4,5,2,8,7);
echo "<br>";

function saludo($nombre="mamá"){
    echo "Hola $nombre";
}
saludo();
echo "<br>";
saludo("Pablo");
echo "<br>";

$a = fn($i, $e) => $e + $i;
$b = function($limite){
    $arr = [];
    for($i = 0; $i < $limite; $i++){
        $arr []= $i;
    }
    return $arr;
};



echo $a(2,3);
print_r($b(100));


echo "<br>";

$array_nums = [0,1,0,0,2,3,0,4,5,0];
$array_ceros = array_filter($array_nums, fn ($e) => $e === 0);
print_r($array_ceros);