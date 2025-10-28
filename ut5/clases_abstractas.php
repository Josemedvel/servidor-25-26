<?php
abstract class PiezaAjedrez{
    const NUM_CASILLAS = 64;
    protected abstract function mover_pieza($x, $y);
    abstract function comer_pieza(PiezaAjedrez $pieza);
    public function saludo(){
        echo "hola";
    }
}

class Peon extends PiezaAjedrez{
    protected function mover_pieza($x, $y)
    {
        
    }
    function comer_pieza(PiezaAjedrez $pieza)
    {
        
    }
}
