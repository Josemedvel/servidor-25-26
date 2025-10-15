<?php
function ordenar(&$array){
    do{
        $ordenado = true;
        for($i = 0; $i < count($array) - 1; $i++){
            if($array[$i] > $array[$i + 1]){ // toca cambiar
                $temp = $array[$i + 1];
                $array[$i + 1] = $array[$i];
                $array[$i] = $temp;
                $ordenado = false;
            }
        }
    }while( !$ordenado);
}
$array = [1,9,2,8];
/*ordenar($array);
echo "<pre>";
print_r($array);
echo "</pre>";
*/
function suma_matriz($a, $b){
    $resultado = [];
    if(count($a) != count($b) || count($a[0]) != count($b[0])){
        echo "No se puede sumar";
    }else{
        for($i = 0; $i < count($a); $i++){
            for($j = 0; $j < count($a[0]); $j++){
                $resultado[$i][$j] = $a[$i][$j] + $b[$i][$j];
            }
        }
    }
    return $resultado;
}
function mult_matriz($a, $b){
    if(count($a[0]) != count($b)){
        return null;
    }
    $res = [];
    for($i = 0; $i < count($a); $i++){ // recorrer filas de a
        for($j = 0; $j < count($b[0]); $j++){//recorrer cols de b
            $suma = 0;
            for($k = 0; $k < count($a); $k++){//producto escalar
                $suma += $a[$i][$k] * $b[$k][$j];
            }
            $res[$i][$j] = $suma;
        }
    }
    return $res;
}

$array_1 = [
    [2,0],
    [0,2],
    [1,3]
];
$array_2 = [
    [1, 0, 4],
    [0, 1, 4]
];
echo "<pre>";
print_r(mult_matriz($array_1, $array_2));
echo "</pre>";