<?php session_start()?>
<?php

include 'Class/classChatRoom.php';
$bdd = new PDO('mysql:host=localhost;dbname=adminchatbox;charset=utf8', 'AdminChatBox', 'Passw0rd!');
?>
<?php
$reqChatBox = $bdd->query("SELECT *, (
    SELECT nom
    FROM chatroom c
    WHERE c.idChatRoom = i.idChatRoom
    ) as nom, (
    	SELECT description
        FROM chatroom c
        WHERE i.idChatRoom = c.idChatRoom
        ) as description, (
    	SELECT idUtilisateur
        FROM chatroom c
        WHERE i.idChatRoom = c.idChatRoom
        ) as idUtilisateurCrée
FROM invitation i
WHERE idUtilisateur =". $_SESSION['userConnectéID']."");
$listeDesRoom = array();


if($reqChatBox != FALSE){
    while ($donnée = $reqChatBox->fetch()) {
        //$idChatRoom = $donnée['idChatRoom'];
        //$nomChatRoom = $donnée['nom'];
        //$description = $donnée['description'];
        //$idUtilisateur = $donnée['idUtilisateur'];
        
        $listeDesRoom[sizeof($listeDesRoom)] = new ChatRoom($donnée);
        $listeDesRoom[sizeof($listeDesRoom) - 1]->afficher();
    }
}

/*    
    if ($idUtilisateur== $_SESSION['userConnectéID']) {
        echo "<li class='Creer'>
        <a href='changementDeChatRoom.php?chatActuel=".$idChatRoom."'><h1>" . $nomChatRoom . "</h1> <p>" . $description . "</p> </a>
        </li>";
    } elseif ($boolParticipant == 1) {

        echo "<li  class='rejointe' >
                                    <a href='changementDeChatRoom.php?chatActuel=".$idChatRoom."'><h1>". $nomChatRoom . "</h1> <p>" . $description . "</p> </a>
                              </li>";
    } elseif ($boolInvité == 1) {
        echo "<li class='demandé' >
                                    <a href='changementDeChatRoom.php?chatActuel=".$idChatRoom."'><h1>". $nomChatRoom ."</h1> <p>" . $description . "</p> </a>
                              </li>";
    }
}
} else {
    echo '<h1>Quelque chose à mal fonctionner.</h1>';
}

echo 'id=' . $_SESSION['userConnectéID'];

$reqChatBox2 = $bdd->query("SELECT propriétaire, invité, participant FROM invitation where idUtilisateur =". $_SESSION['userConnectéID'] ."AND idChatRoom =14");
    while ($donnée2 = $reqChatBox2->fetch()) {
        $propriétaire = $donnée2['propriétaire'];
        $boolInvité = $donnée2['invité'];
        $boolParticipant = $donnée2['participant'];
        echo $propriétaire .' '. $boolInvité . ' '. $boolParticipant;    
    }
    */
?>
