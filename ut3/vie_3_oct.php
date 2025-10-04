<?php

function fibonacci($num){
    if($num == 0){ // estaríamos buscando el valor de la primera posición
        return 0;
    }elseif($num == 1){ // estaríamos buscando el segundo
        return 1;
    }else{ // para cualquier posición no conocida
        return fibonacci($num - 1) + fibonacci($num - 2);
    }
}
echo fibonacci(5);

echo "<br>";

function suma($arr){
    if(count($arr) == 1){ // cuando solo hay 1 elem, la suma es trivial
        return array_pop($arr);
    }else{ // para cualquier otro caso
        return array_pop($arr) + suma($arr);
    }
}
echo suma([1,2,3,4,5,6,7,8,9,10]);