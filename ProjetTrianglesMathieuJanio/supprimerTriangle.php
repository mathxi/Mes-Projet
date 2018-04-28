<?php

include_once 'Config.php';
include_once 'Classes/Point.php';
include_once 'Classes/Polygone.php';
include_once 'Classes/Triangle.php';
$id = $_GET['id'];
$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASE
                , Config::UTILISATEUR, Config::MOTDEPASSE);

        $req = $db->prepare("DELETE FROM points where idPolygone=$id");
        $req2 = $db->prepare("DELETE FROM polygones where id=$id");
        $req->execute();
        $req2->execute();

        //je ferme la connexion
        $db = null;
header("location: index.php");
?>