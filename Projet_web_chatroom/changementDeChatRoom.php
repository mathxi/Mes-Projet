<?php

session_start();
if ($_SESSION['connecte'] == 1) {
?> <?php

    include_once 'Config.php';
    $bdd = new PDO("mysql:host=".Config::SERVEUR."; port=". Config::PORT ." ; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
    $req = $bdd->prepare('UPDATE invitation
    SET nouveauMessage = 0
    WHERE idChatRoom= :idChat AND idUtilisateur = :idUtilisateur');
    $req->bindParam("idUtilisateur",  $_SESSION['userConnectéID'] );
    $req->bindParam("idChat", $_GET['chatActuel']  );
    $req->execute();
    ?>
    <SCRIPT LANGUAGE="JavaScript">
    window.location.replace("messageChatRoom.php?ChatRoom=<?php echo $_GET['chatActuel'] ?> ");    
    </SCRIPT>
    <?php
    echo "<ul><li><a href='messageChatRoom.php?ChatRoom=" . $_GET['chatActuel'] . "' > changelent de room</a></li></ul>";
    echo '_get = ' . $_GET['chatActuel'];
?>
    <?php

} else {
    ?>
    <SCRIPT LANGUAGE="JavaScript">
    window.location.replace("index.php?connecter=false");    
    </SCRIPT>
    <?php
    
}