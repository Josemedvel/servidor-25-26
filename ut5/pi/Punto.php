<?php
class Punto{
    private float $x;
    private float $y;

    public function __construct(float $x, float $y){
        $this->x = $x;
        $this->y = $y;
    }
    public function get_x():float{
        return $this->x;
    }
    public function get_y():float{
        return $this->y;
    }
    public function distancia(Punto $p): float{
        return (($this->x - $p->get_x())**2 + ($this->y -$p->get_y())**2) ** 0.5 ;
    }
}