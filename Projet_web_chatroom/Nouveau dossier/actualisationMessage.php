<?php
session_start();
if ($_SESSION['connecte'] == 1) {


    include_once 'Config.php';
    $bdd = new PDO("mysql:host=" . Config::SERVEUR . "; port=" . Config::PORT . " ; charset=utf8; dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
    $req3 = $bdd->query("SELECT invité FROM invitation where idUtilisateur =" . $_SESSION['userConnectéID'] . " AND idChatRoom=" . $_GET['ChatRoom'] . "");
    $resReq3 = $req3->fetch();
    if ($resReq3['invité'] == 0) {
        ?>

        <button class="btn" id="scrollbas" onclick="AllerEnBasDuScroll()">↓</button>
        
        <?php
        $req = $bdd->query("SELECT * FROM message where idChatroom =" . $_GET['ChatRoom'] . " ORDER BY dateMessage");
        $req2 = $bdd->query("select idUtilisateur from chatroom where idChatRoom=" . $_GET['ChatRoom'] . "");
        $idCree = $req2->fetch();

        while ($donnée = $req->fetch()) {

            $message = $donnée['contenu'];
            $idChatRoom = $donnée['idChatroom'];
            $time = $donnée['dateMessage'];
            $idUtilisateur = $donnée['idUtilisateur'];
            $idMessage = $donnée['idMessage'];
            // echo  $idUtilisateur  ;
            $reqRecupPseudo = $bdd->query("SELECT identifiant FROM utilisateur where id =" . $idUtilisateur . "");
            // + civilité et mettre condition pour choisir l'image dans le message
            $reqRecupCivilite = $bdd->query("SELECT civilité FROM utilisateur where id =" . $idUtilisateur . "");
            $reqRecupPrenom = $bdd->query("SELECT prénom FROM utilisateur where id =" . $idUtilisateur . "");
            $reqRecupNom = $bdd->query("SELECT nom FROM utilisateur where id =" . $idUtilisateur . "");

            $donnéeRecupCivilite = $reqRecupCivilite->fetch();
            $civiliteMessage = $donnéeRecupCivilite['civilité'];


            $donnéeRecupPseudo = $reqRecupPseudo->fetch();
            $pseudoMessage = $donnéeRecupPseudo['identifiant'];

            $donnéeRecupPrenom = $reqRecupPrenom->fetch();
            $prenomMessage = $donnéeRecupPrenom['prénom'];



            $donnéeRecupNom = $reqRecupNom->fetch();
            $NomMessage = $donnéeRecupNom['nom'];

//echo "   peudo de celui qui écrit le message =  $pseudoMessage" ;
            if ($pseudoMessage != $_SESSION['userConnectéIdentifiant']) {
                echo "
                <div class = 'col s12 m7 lambda'>
                <button data-target='modal4' class='btn-flat modal-trigger' onclick='GetProfil($idUtilisateur)' >$prenomMessage $NomMessage</button>
                <div class = 'card horizontal z-depth-2'>
                <div class = 'card-image'>
                ";
                if ($civiliteMessage == 'M.') {
                    echo "<img src='images/Avatar_H.png'>";
                }
                if ($civiliteMessage == 'Mme') {
                    echo "<img src='images/Avatar_F.png'>";
                }
                echo "
                    </div>
                <div class = 'card-stacked'>
                <div class = 'card-content'>
                <p>$message</p>
                </div>
                <div class = 'card-action'>
                <p>$time</p>
                ";
                if ($idCree['idUtilisateur'] == $_SESSION['userConnectéID']) {
                    echo "<a href='ActionSuppMessage.php?idMessage=$idMessage&amp;idChatRoom=" . $_GET['ChatRoom'] . "' class='secondary-content'><i class='material-icons'>cancel</i></a>";
                };
                echo"
                </div>
                </div>
                </div>
                </div>";
            } else {
                echo "
                    <div class = 'col s12 m7 expediteur'>
                <button data-target='modal4' class='btn-flat modal-trigger' onclick='GetProfil($idUtilisateur)' >$prenomMessage $NomMessage</button>
                <div class = 'card horizontal z-depth-2'>
                <div class = 'card-image'>
                ";
                if ($civiliteMessage == 'M.') {
                    echo "<img src='images/Avatar_H.png'>";
                }
                if ($civiliteMessage == 'Mme') {
                    echo "<img src='images/Avatar_F.png'>";
                }
                echo "
                </div>
                <div class = 'card-stacked'>
                <div class = 'card-content'>
                <p>$message</p>
                </div>
                <div class = 'card-action'>
                <p>$time</p>
                <a href='ActionSuppMessage.php?idMessage=$idMessage&amp;idChatRoom=" . $_GET['ChatRoom'] . "' class='secondary-content'><i class='material-icons'>cancel</i></a>
                </div>
                </div>
                </div>
                </div>";
            }
        }
        echo "<div id='finMess'></div>";
    } else {
        ?>
        <h1>Vous devez accepter l'invitation pour pouvoir accèder au chat</h1>
        <?php
    }
    ?>


    <?php
} else {
    header('Location:index.php?connecter=false');
}