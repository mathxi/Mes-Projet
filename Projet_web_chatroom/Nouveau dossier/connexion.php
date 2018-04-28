<?php
session_start(); //Démarrage du service
$user=$_POST['identifiant'];
$password=hash('sha256', $_POST['mdp']);
include_once 'Config.php';
$bdd = new PDO("mysql:host=".Config::SERVEUR."; port=". Config::PORT ." ; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
$requser=$bdd->prepare("SELECT * FROM utilisateur WHERE identifiant=:identifiant AND motDePasse=:mdp");
$requser->execute(array(':identifiant' => $user, ':mdp' => $password));
$resultat=$requser->fetchAll();
if ($resultat != NULL){
    if(($user==$resultat[0]['identifiant']) && ($password==$resultat[0]['motDePasse'])){
      $_SESSION['userConnectéNom']=$resultat[0]['nom'];
      $_SESSION['prénom']=$resultat[0]['prénom'];
      $_SESSION['userConnectéID']=$resultat[0]['id'];
      $_SESSION['userConnectéIdentifiant']=$resultat[0]['identifiant'];
      $_SESSION['userConnectéCivilité']=$resultat[0]['civilité'];
      $_SESSION['userConnectéEmail']=$resultat[0]['email'];
      $_SESSION['connecte']=1;
      header('Location:chatRoom.php');

    }
    else{
header('Location:index.php?infos=false');
    }
}
else{
header("Location:index.php?infos=$password");
}
$bdd=null;
?>