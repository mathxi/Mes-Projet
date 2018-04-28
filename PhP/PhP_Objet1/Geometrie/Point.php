<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
    <?php
    
/**
 * Description of Point
 * 
 * @author Jhon Macmanaman
 */    
class point {
    private $x;
    private $y;
    
    public function getx(){
        
        return $this-> x;
    }
    public function setx($value){
        $this->x = $value;
        
    }
    public function gety(){
        
        return $this-> y;
    }
    public function sety($value){
        $this->y = $value;
        
    }
    /**
     * Constructeur de Point
     * @param type $abscisse Abscisse du point
     * @param type $ordonnée Ordonnée du point
     */
    public function __construct($abscisse, $ordonnée) {
        $this->x=$abscisse;
        $this->y=$ordonnée;
    }

    
    public function __toString() {
        return "($this->x,$this->y)";
    }

    
    /**
     * retourne la distance entre deux points
     * @param point $autrePoint l'autre point 
     * @return type la distance
     */
    public function calculerDistance(point $autrePoint){
        
        return sqrt(
                    pow($this->x - $autrePoint->x, 2)
                    +
                    pow($this->y - $autrePoint->y,2)
                
                
                );
    }
    
}
        ?>
    </body>
</html>
