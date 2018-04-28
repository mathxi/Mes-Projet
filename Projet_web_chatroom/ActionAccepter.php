<?php
session_start();
if ($_SESSION['connecte']==1){
    include_once 'Config.php';
    $bdd = new PDO("mysql:host=".Config::SERVEUR."; port=". Config::PORT ." ; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);

    

    if($_GET['reponse'] == "oui"){

        $req=$bdd->prepare("UPDATE invitation SET invité = '0' WHERE idUtilisateur = :idCo AND idChatRoom= :idChat  AND invité=1");
        $req->bindParam(":idCo", $_SESSION['userConnectéID'] );
        $req->bindParam(":idChat", $_GET['idChatRoom']  );
        $req->execute();


        header('Location: ChatRoom.php?Acceptation=sucess');
    }else if($_GET['reponse'] == "non"){

        $req=$bdd->prepare("DELETE FROM invitation WHERE idUtilisateur = :idCo AND idChatRoom= :idChat AND invité=1");
        $req->bindParam(":idCo", $_SESSION['userConnectéID'] );
        $req->bindParam(":idChat", $_GET['idChatRoom']  );
        $req->execute();

        header('Location: ChatRoom.php?Declinaison=sucess');
    }else{

        header('Location: ChatRoom.php?Action=problème');
    }
} else {
    header('Location:index.php?connecter=false');
}

?>