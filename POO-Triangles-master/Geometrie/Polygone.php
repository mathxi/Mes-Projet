<?php


//je rend ma classe abstraite pour qu'elle ne serve QUE à l'héritage
abstract class Polygone {

    //pour la bdd
    private $id;
    public function getId(){ return $this->id; }
    public function setId($value){ $this->id=$value; }
    
    protected $listeDesPoints;
    private $couleur;

    public function getCouleur() {
        return $this->couleur;
    }

    public function setCouleur($valeur) {
        $this->couleur = $valeur;
    }

    /**
     * Constructeur de polygone
     * @param Tableau de Points $desPoints
     * @param Une couleur html $uneCouleur
     */
    public function __construct($desPoints, $uneCouleur) {
        $this->listeDesPoints = $desPoints;
        $this->couleur = $uneCouleur;
    }

    //[(5,6);(4,8);(2,9)]
    public function __toString() {
        $res = "[";
        for ($i = 0; $i < count($this->listeDesPoints); $i++) {
            $res .= $this->listeDesPoints[$i];
            if ($i != count($this->listeDesPoints) - 1) {
                $res .= ";"; //raccourci pour $res = $res.";";
            }
        }
        $res .= "]";

        return $res;
    }

    public function CalculerPerimetre() {
        $nbPoints = count($this->listeDesPoints);
        $perimetre = 0;

        for ($i = 0; $i < $nbPoints - 1; $i++) {
            $perimetre += $this->listeDesPoints[$i]->CalculerDistanceJusquA($this->listeDesPoints[$i + 1]);
        }
        $perimetre += $this->listeDesPoints[0]->CalculerDistanceJusquA($this->listeDesPoints[$nbPoints - 1]);

        return $perimetre;
    }

    //une méthode abstraite oblige les classes filles
    //à l'implémenter. Sinon, ça ne compile pas
    abstract public function CalculerSurface();
    
    
    public function Inserer() {
        $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname="
                . config::DBNAME, config::USER, config::PASSWORD);

        $req = $db->prepare("INSERT INTO polygones (couleur)"
                . " VALUES (:couleur)");

        $req->bindParam(":couleur", $this->couleur);

        $req->execute();

        $this->id = $db->lastInsertId();

        $db = null;

        foreach ($this->listeDesPoints as $unPoint) {
            $unPoint->setIdPolygone($this->id);
            $unPoint->Inserer();
        }
    }
    
    
}
