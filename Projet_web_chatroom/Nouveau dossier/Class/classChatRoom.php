<?php

if ($_SESSION['connecte'] == 1) {


    class ChatRoom {

        private $idChatRoom;
        private $invité;
        private $idUtilisateur;
        private $nom;
        private $description;
        private $idUtilisateurCrée;

        public function __construct($données) {
            $this->idChatRoom = $données['idChatRoom'];
            $this->invité = $données['invité'];
            $this->idUtilisateur = $données['idUtilisateur'];
            $this->nom = $données['nom'];
            $this->description = $données['description'];
            $this->idUtilisateurCrée = $données['idUtilisateurCrée'];
        }

        public function afficher() {
            $bdd = new PDO("mysql:host=" . Config::SERVEUR . "; port=" . Config::PORT . " ; charset=utf8; dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
            $req = $bdd->query('select nouveauMessage from invitation where idUtilisateur=' . $this->idUtilisateur . '   AND idChatRoom=' . $this->idChatRoom . '');
            $reqNotif = $req->fetch(); 
            if ($this->idUtilisateur == $this->idUtilisateurCrée) {
                echo "<li class='propriétaire cotéChat'>
                        <p style=' float:right;' >Propriétaire</p><a href='changementDeChatRoom.php?chatActuel=" . $this->idChatRoom . "'><h1>" . $this->nom . "</h1> <p>" . $this->description . "</p> </a>
                        <span class='new badge'>" . $reqNotif['nouveauMessage'] . "</span></div>    
                        <a href='ActionSuppressionChatRoom.php?idChatRoom=" . $this->idChatRoom . "&amp;creer=oui'  class='tooltipped' data-position='bottom' data-tooltip='Supprimer la ChatRoom'><i class='material-icons'>cancel</i></a>
                      </li>";
            } elseif ($this->invité == 0) {
                echo "<li class='chatRejoint cotéChat' >
                        <p style=' float:right;' >Participant</p>
                        <a href='changementDeChatRoom.php?chatActuel=" . $this->idChatRoom . "'><h1>" . $this->nom . "</h1> <p>" . $this->description . "</p> </a>
                        <span class='new badge'>" . $reqNotif['nouveauMessage'] . "</span></div>   
                         <a href='ActionSuppressionChatRoom.php?idChatRoom=" . $this->idChatRoom . "&amp;creer=non' ><i class='material-icons'>directions_run</i></a>
                      </li>";
            } elseif ($this->invité == 1) {
                echo "<li class='attente cotéChat' >
                        <p style=' float:right;' >Invité</p><a href='changementDeChatRoom.php?chatActuel=" . $this->idChatRoom . "'><h1>" . $this->nom . "</h1> <p>" . $this->description . "</p> </a>
                        <a href='ActionAccepter.php?idChatRoom=" . $this->idChatRoom . "&amp;reponse=oui' >Accepter</a>
                        <a href='ActionAccepter.php?idChatRoom=" . $this->idChatRoom . "&amp;reponse=non' >Décliner</a>
                     </li>";
            }
        }

    }

?>
    <?php

} else {
    header('Location:index.php?connecter=false');
}
    ?>