<?php
include_once("Punto.php");

class Diana{
    private Punto $centro;
    private float $radio;
    private float $num_aciertos;
    private float $num_lanzamientos;
    private float $error_admisible;

    public function __construct(){
        $this->centro = new Punto(0,0);
        $this->radio = 1.0;
        $this->num_aciertos = 0.0;
        $this->num_lanzamientos = 0.0;
        $this->error_admisible = 1e-6;
    }

    public function lanzar_dardo() : void{
        $x = rand(-100000000,100000000)/100000000;
        $y = rand(-100000000,100000000)/100000000;
        
        $nuevo_dardo = new Punto($x, $y);
        
        // está dentro?
        if($nuevo_dardo->distancia($this->centro) <= $this->radio){
            $this->num_aciertos++;
        }
        $this->num_lanzamientos++;
    }
    public function calcular_pi(): float{
        if($this->num_lanzamientos != 0 ){
            return (4.0 * $this->num_aciertos) / $this->num_lanzamientos;
        }else{
            echo "No se puede dividir sin lanzamientos";
            return -1;
        }
    }
}

$diana = new Diana();
for($i = 0; $i < 10000000; $i++){
    $diana->lanzar_dardo();
}
echo $diana->calcular_pi();