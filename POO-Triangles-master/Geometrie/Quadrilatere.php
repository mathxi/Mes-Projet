<?php


class Quadrilatere extends Polygone {

    public function __construct($a, $b, $c, $d, $uneCouleur) {
        parent::__construct([$a, $b, $c, $d], $uneCouleur);
    }

    //je coupe en deux triangles
    public function CalculerSurface() {
        $tri1=new Triangle($this->listeDesPoints[0],$this->listeDesPoints[1],$this->listeDesPoints[2],"");
        $tri2=new Triangle($this->listeDesPoints[2],$this->listeDesPoints[3],$this->listeDesPoints[0],"");
        
        return ($tri1->CalculerSurface()+$tri2->CalculerSurface());
    }
}
