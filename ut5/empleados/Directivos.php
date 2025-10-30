<?php

require_once("Empleado.php");

use Empleado;

class Directivo extends Empleado{
    private string $departamento;
    private int $plaza_aparcamiento;
    private float $porc_variable;
    private float $porc_cumpl = 0;
    private array $subordinados = [];


    public function __construct(string $nombre, string $email, float $sueldo, string $departamento, int $plaza_aparcamiento, float $porc_variable, float $porc_cumpl){
        parent::__construct($nombre, $email, $sueldo);
        $this->departamento = $this->comprobar_cadena_vacia($departamento);
        $this->plaza_aparcamiento = $this->comprobar_no_negativo($plaza_aparcamiento);
        $this->porc_variable = $this->comprobar_no_negativo($porc_variable);
    }

    public function asignar_empleado(Empleado $empl){
        if($empl != null && $this->empleado_unico($empl)){
            $this->subordinados[] = $empl;
        }
    }

    public function despedir_empleado(Empleado $empl){
        if($empl != null && !$this->empleado_unico($empl)){
            $indice = 0;
            foreach($this->subordinados as $i => $e){
                if($empl->equals($e)){
                    $indice = $i;
                    break;
                }
            }
            array_splice($this->subordinados, $indice, 1);
        }
    }

    public function subir_sueldo(){
        $this->porc_variable *= 1.05;
        $this->sueldo *= 1.05;
    }


    public function cobrar(){
        $this->dinero_acumulado += $this->sueldo + (($this->sueldo*$this->porc_variable) / 12);
    }

    private function empleado_unico(Empleado $empl) : bool{
        foreach($this->subordinados as $comp){
            if($comp->equals($empl)){
                return false;
            }
        }
        return true;
    }

    public function alcanzar_objetivo(){
        $this->porc_cumpl += 0.1;
        if(abs($this->porc_cumpl - 1) < 1e-6){
            $this->porc_cumpl = 0;
            $this->dinero_acumulado += $this->sueldo;
        }
    }
}