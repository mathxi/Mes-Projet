<?php session_start()  ?>
<ul>
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=adminchatbox;charset=utf8', 'AdminChatBox', 'Passw0rd!');
    $req = $bdd->query("SELECT * FROM message where idChatroom =".$_SESSION['ChatRoom']." order by dateMessage");
   
    
    
    while ($donnée = $req->fetch() ) {
        $message = $donnée['contenu'];
        $idChatRoom = $donnée['idChatroom'];
        $time = $donnée['dateMessage'];
        $idUtilisateur = $donnée['idUtilisateur'];
        $idMessage = $donnée['idMessage'];
       // echo  $idUtilisateur  ;
        $reqRecupPseudo = $bdd->query("SELECT identifiant FROM utilisateur where id =".$idUtilisateur."");
            while ($donnéeRecupPseudo = $reqRecupPseudo->fetch() ) { $pseudoMessage = $donnéeRecupPseudo['identifiant']; }
//echo "   peudo de celui qui écrit le message =  $pseudoMessage" ;
        if ($pseudoMessage != $_SESSION['userConnectéIdentifiant']) {
            echo "<li  class ='lambda'><h4 class='pseudo'>$pseudoMessage</h4>
                            <img src='images/Avatar.png' class='avatar'>
                            <p>$message</p>   
                            <p>$time</p>     
                  </li>";
        } else {
            echo "<li  class ='expediteur'><h4 class='pseudoExp'>$pseudoMessage</h4>
                            <img src='images/Avatar.png' class='avatarExp'>
                            <p class='messageExp'>$message</p>   
                            <p class='timeExp'>$time</p>
                            <a href=ActionSuppMessage.php?idMessage=$idMessage >X</a>
                  </li>";
        }
    }
    ?>
</ul>