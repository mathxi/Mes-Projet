<?php


class Triangle extends Polygone {
    public function __construct($a, $b, $c, $uneCouleur) {
        parent::__construct([$a,$b,$c], $uneCouleur);
    }
    
    public function EstIsocele(){
        return $this->listeDesPoints[0]->CalculerDistanceJusquA($this->listeDesPoints[1])
                ==
                $this->listeDesPoints[1]->CalculerDistanceJusquA($this->listeDesPoints[2])
                ||
                $this->listeDesPoints[1]->CalculerDistanceJusquA($this->listeDesPoints[2])
                ==
                $this->listeDesPoints[2]->CalculerDistanceJusquA($this->listeDesPoints[0])
                ||
                $this->listeDesPoints[0]->CalculerDistanceJusquA($this->listeDesPoints[1])
                ==
                $this->listeDesPoints[2]->CalculerDistanceJusquA($this->listeDesPoints[0]);
    }
    
    //https://fr.wikipedia.org/wiki/Formule_de_H%C3%A9ron
    public function CalculerSurface() {
        $p=$this->CalculerPerimetre()/2;
        $a=$this->listeDesPoints[0]->CalculerDistanceJusquA($this->listeDesPoints[1]);
        $b=$this->listeDesPoints[1]->CalculerDistanceJusquA($this->listeDesPoints[2]);
        $c=$this->listeDesPoints[0]->CalculerDistanceJusquA($this->listeDesPoints[2]);
        
        return sqrt($p*($p-$a)*($p-$b)*($p-$c));
    }
    
    public static function getTriangles(){
        $db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME
                , Config::USER, Config::PASSWORD);
        $req=$db->prepare("select * from polygones where (select count(*) from points"
                . " where idPolygone=polygones.id)=3");
        $req->execute();
        
        $resultat=$req->fetchAll();
        
        $triangles=[];
        
        foreach ($resultat as $ligne) {
            $tri=Triangle::getTriangle($ligne["id"]);
            $triangles[]=$tri;
        }
        
        $db=null;
        
        return $triangles;
        
    }
    public static function getTriangle($id){
        $db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME
                , Config::USER, Config::PASSWORD);

        $req=$db->prepare("select * from polygones where id=:id");
        $req->bindParam(":id",$id);
        $req->execute();
        
        $resultat=$req->fetchAll();
        
        foreach ($resultat as $ligne) {
            $reqPoints=$db->prepare("select * from points "
                    . " where idPolygone=:idPolygone");
            $reqPoints->bindParam(":idPolygone", $ligne["id"]);
            
            $reqPoints->execute();
            $resultatPoint=$reqPoints->fetchAll();
            
            $points=[];
            
            foreach ($resultatPoint as $lignePoint) {
                $p=new Point($lignePoint["x"],$lignePoint["y"]);
                $p->setId($lignePoint["id"]);
                $points[]=$p;
            }
            
            $tri=new Triangle($points[0],$points[1],$points[2]
                    , $ligne['couleur']);
            $tri->setId($ligne["id"]);
        }
        
        $db=null;
        
        return $tri;
    }
}
    