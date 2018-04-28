<?php

session_start();
include_once 'Config.php';
$bdd = new PDO("mysql:host=" . Config::SERVEUR . "; port=" . Config::PORT . " ; charset=utf8; dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
$id = $_SESSION['userConnectéID'];
$descritpion = $_POST['Description'];
$req = $bdd->prepare('UPDATE utilisateur
SET Description = :description
WHERE id = :id');

$req ->bindParam( ':description' , $descritpion);
$req ->bindParam( ':id' , $id);
$req ->execute();

header('Location: chatRoom.php');