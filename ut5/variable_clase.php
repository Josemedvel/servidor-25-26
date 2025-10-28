<?php
class Persona{
    public static int $num_personas = 0;
    public string $name = "";
    public array $hermanos = ["Julia", "Antonio"];
    public function __construct(string $name){
        $this->name = $name;
        self::$num_personas++;
    }
    public function get_name(): string{
        return $this->name;
    }
    public function __toString() : string
    {
        return "Nombre: $this->name, Hermanos:" . print_r($this->hermanos, True);
    }
}

$p1 = new Persona("Manuel");
echo $p1->get_name();
echo "<br>";
echo Persona::$num_personas;
echo "<br>";

foreach($p1 as $propiedad=>$valor){
    if(gettype($valor) === "array"){
        echo "$propiedad -> ";
        print_r($valor);
    }else{
        echo "$propiedad -> $valor";
    }
    echo "<br>";
}

echo $p1;