<?php session_start() //INSERTION NOUVELLE CHATROOM   ?>
<?php

try {
    include_once 'Config.php';
    $bdd = new PDO("mysql:host=".Config::SERVEUR."; port=". Config::PORT ." ; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
    echo 'connect success';
} catch (Exception $e) {
    echo 'ERROR:' . $e->getMessage();
}

$idChatRoom = $_GET['idChatRoom'];
$idUtilisateurAentrer = $_GET['idUtilisateur'];

$req = $bdd->query("select COUNT(invité) from invitation where idChatRoom =$idChatRoom and idUtilisateur=$idUtilisateurAentrer");

$result = $req->fetch();
if ($result['COUNT(invité)'] > 0) {
   // header('Location: chatRoom.php?error=DejaDedans');
} else {
    $req2 = $bdd->query("INSERT INTO invitation 
        (idChatRoom,invité,idUtilisateur) 
            VALUES ('$idChatRoom','1','" . $idUtilisateurAentrer . "')");
    //header('Location: chatRoom.php?success=oui');
}
?>