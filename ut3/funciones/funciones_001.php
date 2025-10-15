<?php

$cadena = "añil";
$array = mb_str_split($cadena);
$palabras = explode(" ", $cadena);
/*echo mb_strlen($cadena);
echo "<br>";
echo implode("_", $array);
echo "<br>";
echo "<pre>";
print_r($array);
echo "</pre>";
*/
function moda_cadena($cadena){
    $letra_mas_rep = "";
    $num_rep_max = 0;
    $array_cadena = mb_str_split(implode("", explode(" ", $cadena)));
    foreach($array_cadena as $letra){
        $num_rep = 0;
        foreach($array_cadena as $letra_p){
            if($letra_p == $letra){
                $num_rep++;
                if($num_rep > $num_rep_max){
                    $letra_mas_rep = $letra;
                    $num_rep_max = $num_rep;
                }
            }
        }
    }
    return $letra_mas_rep;
}




function moda_cadena_2($cadena){
    $num_rep_max = 0;
    $letra_mas_rep = "";
    $ocurrencias = [];
    $array_letras = mb_str_split(implode("", explode(" ",$cadena)));
    foreach($array_letras as $letra){
        if(isset($ocurrencias[$letra])){
            $ocurrencias[$letra]++;
        }else{
            $ocurrencias[$letra] = 1;
        }
        if($ocurrencias[$letra] > $num_rep_max){
                $num_rep_max = $ocurrencias[$letra];
                $letra_mas_rep = $letra;
            }
    }
    return $letra_mas_rep;
}

echo moda_cadena_2("hola bue  nas  ");

echo "<br>";
//reemplazos
$cadena_2 = "Buenos días días";
$array_cadena_2 = mb_str_split($cadena_2);
array_splice($array_cadena_2, mb_strpos($cadena_2, "días"), mb_strlen("días"),"1");
echo implode($array_cadena_2);
echo "<br>";
echo mb_strpos($cadena_2, "í"); // posición de la primera ocurrencia de una cadena

function replacent($haystack, $needle, $replacement){
    $array_cad = mb_str_split($haystack);
    $array_cad_busqueda = mb_str_split($needle);
    foreach($array_cad as $i => $letra){
        if($letra == $array_cad_busqueda[0] && (count($array_cad) - $i) >= count($array_cad_busqueda)){ // inicio
            $existe = true;
            foreach($array_cad_busqueda as $j => $letra_p){
                if($array_cad[$i + $j] != $letra_p){
                    $existe = false;
                    break;
                }
            }
            if($existe){
                
            }
        } 
    }
}