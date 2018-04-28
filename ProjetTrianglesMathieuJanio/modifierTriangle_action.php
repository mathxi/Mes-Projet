<?php
//version manuelle
//$x1=$_POST['x1'];
//$y1=$_POST['y1'];
//$x2=$_POST['x2'];
//$y2=$_POST['y2'];
//$x3=$_POST['x3'];
//$y3=$_POST['y3'];

//pour les joueurs : la version boucle
for ($i = 1; $i < 4; $i++) {
    $x="x$i";
    $y="y$i";
    
    $$x=$_POST[$x];
    $$y=$_POST[$y];
}
$id=$idTriangle;
echo $id;
$couleur=$_POST["couleur"];
$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASE
                , Config::UTILISATEUR, Config::MOTDEPASSE);
$req=$db->prepare("UPDATE points SET x = 599, y = 600 WHERE id = 209");

include_once 'Config.php';
include_once 'Classes/Point.php';
include_once 'Classes/Polygone.php';
include_once 'Classes/Triangle.php';

$tri=new Triangle(
            new Point($x1,$y1)
            , new Point($x2,$y2)
            , new Point($x3,$y3)
            , $couleur
        );
/*
$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASE
                , Config::UTILISATEUR, Config::MOTDEPASSE);

        $req=$db->prepare("UPDATE points SET x = 599, y = 600 WHERE id = 209");
        $req->bindParam(":x", $this->x);
        $req->bindParam(":y", $this->y);
       // $req->bindParam(":id_polygone", $id_polygone);
        $req->execute();

        //je ferme la connexion
        $db = null;

	$tri->MettreAJour();


header("location: index.php");
die();