<?php

class Point {

    //pour la bdd
    private $id;
    private $idPolygone;
    
    public function getId(){ return $this->id; }
    public function getIdPolygone(){ return $this->idPolygone; }
    public function setId($value){ $this->id=$value; }
    public function setIdPolygone($value){ $this->idPolygone=$value; }
    
    private $x;
    private $y;

    public function getX() {
        return $this->x;
    }

    public function getY() {
        return $this->y;
    }

    /**
     * Constructeur de point
     * @param int $abscisse Abscisse du point
     * @param int $ordonnee Ordonnée du point
     */
    public function __construct($abscisse, $ordonnee) {
        $this->x = $abscisse;
        $this->y = $ordonnee;
    }

    /**
     * retourne une chaine de caractère "(x,y)"
     * appelée automatiquement si on essaie de faire un echo
     * du point 
     * @return string
     */
    public function __toString() {
        return "($this->x,$this->y)";
    }

    public function CalculerDistanceJusquA($autrePoint) {
        return Sqrt(
                Pow($this->x - $autrePoint->x, 2) +
                Pow($this->y - $autrePoint->y, 2)
        );
    }

     public function Inserer(){
         //faire une connexion à la BDD
         $db=new PDO("mysql:host=".config::SERVERNAME
                 .";dbname=".config::DBNAME
                 , config::USER, config::PASSWORD);
         $req=$db->prepare("INSERT INTO `points`(`x`, `y`, `idPolygone`) ".
                 "VALUES (:x,:y,:idPolygone)");
         $req->bindParam(":x", $this->x);
         $req->bindParam(":y", $this->y);
         $req->bindParam(":idPolygone", $this->idPolygone);
         
         $req->execute();
         
         $this->id==$db->lastInsertId();
         
         //je n'oublie pas de détruire ma connexion
         $db=null;
     }
}
