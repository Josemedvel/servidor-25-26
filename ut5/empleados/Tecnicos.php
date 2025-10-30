<?php

require_once("Empleado.php");

use Empleado;

class Tecnico extends Empleado{

    private int $nivel_habilidad;
    private float $productividad;
    private float $productividad_acumulada = 0;
    private string $edificio;
    
    public function __construct(string $nombre, string $email, float $sueldo, string $edificio, int $nivel=0, float $productividad=3.0){
        parent::__construct($nombre, $email, $sueldo);
        $this->nivel_habilidad = $nivel;
        $this->productividad = $productividad;
        $this->edificio = $edificio;
    }

    public function cobrar(){
        $this->dinero_acumulado += $this->sueldo + $this->productividad_acumulada;
        $this->productividad_acumulada = 0;
    }

    public function subir_sueldo(){
        $this->productividad++;
        $this->sueldo *= 1.02;
    }

    public function reparar(int $num=1){
        $numero = $this->comprobar_no_negativo($num);
        $this->productividad_acumulada += $this->productividad * $numero;
    }
}