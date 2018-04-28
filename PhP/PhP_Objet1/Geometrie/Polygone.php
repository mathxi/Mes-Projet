<?php 
/**
 * Description of Polygone
 * 
 * 
 * 
 * @author bite
 * 
 */

class Polygone{
    
    private $listeDesPoints;
    private $couleur;
    
    public function getCouleur(){
        return $this->couleur;
        
        
    }
    
    public function setCouleur($value){
        
        $this->couleur=$value;
        
    }
    
    public function __construct($desPoints, $uneCouleur) {
        $this->listeDesPoints=$desPoints;
        $this->couleur=$uneCouleur;
        
    }
    public function __toString() {
        $res = "]";
        for($i = 0 ; $i < count($this->listeDesPoints); $i++){
            $res . = $this->listeDesPoints[$i];
            if( )
        }
    }
    
    
    
    
}


?>