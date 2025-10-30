<?php
abstract class Empleado{
    protected static int $num_empleado = 0;
    protected int $id_empleado;
    protected string $nombre;
    protected string $email;
    protected float $sueldo;
    protected float $dinero_acumulado = 0;
    protected int $dias_trabajados = 0;
    
    public function __construct(string $nombre, string $email, float $sueldo){
        $this->id_empleado = self::$num_empleado;
        self::$num_empleado++;
        $this->nombre = $this->comprobar_cadena_vacia($nombre);
        $this->email = $this->comprobar_cadena_vacia($email);
        $this->sueldo = $this->comprobar_sueldo($sueldo);
    }

    protected function cobrar(){
        $this->dinero_acumulado += $this->sueldo;
    }
    
    protected function comprobar_cadena_vacia(string $cadena): string {
        if(trim($cadena) == ""){
            throw new Exception("La cadena está vacía");
        }
        return trim($cadena);
    }
    protected function comprobar_sueldo(float $numero): float{
        if($numero < 1200){
            throw new Exception("El sueldo no puede ser menor a 1200€");
        }
        return $numero;
    }

    protected function comprobar_no_negativo(int | float $numero){
        if($numero < 0){
            throw new Exception("El número no puede ser negativo");
        }
        return $numero;
    }

    public function trabajar(){
        $this->dias_trabajados++;
        if($this->dias_trabajados == 20){
            $this->cobrar();
            $this->dias_trabajados = 0;
        }
    }

    public abstract function subir_sueldo();

    public function get_id(): int{
        return $this->id_empleado;
    }

    public function equals(Empleado $other): bool{
        return $this->id_empleado === $other->get_id();
    }
}