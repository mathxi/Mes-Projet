<?php

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

        if ($this->idUtilisateur == $this->idUtilisateurCrée) {
            echo    "<li class='propriétaire cotéChat'>
                        <a href='changementDeChatRoom.php?chatActuel=" . $this->idChatRoom . "'><h1>" . $this->nom . "</h1> <p>" . $this->description . "</p> </a>
                        <a href='ActionSuppressionChatRoom.php?idChatRoom=".$this->idChatRoom."&amp;creer=oui' >Supprimer la ChatRoom</a>
                    </li>";
        } elseif ($this->invité == 0) {

            echo    "<li class='chatRejoint cotéChat' >
                        <a href='changementDeChatRoom.php?chatActuel=" . $this->idChatRoom . "'><h1>" . $this->nom . "</h1> <p>" . $this->description . "</p> </a>
                         <a href='ActionSuppressionChatRoom.php?idChatRoom=".$this->idChatRoom."&amp;creer=non' >Quitter le Chat</a> 
                    </li>";
        } elseif ($this->invité == 1) {
            echo    "<li class='attente cotéChat' >
                        <a href='changementDeChatRoom.php?chatActuel=" . $this->idChatRoom . "'><h1>" . $this->nom . "</h1> <p>" . $this->description . "</p> </a>
                        <a href='ActionAccepter.php?idChatRoom=".$this->idChatRoom."&amp;reponse=oui' >Accepter</a>
                        <a href='ActionAccepter.php?idChatRoom=".$this->idChatRoom."&amp;reponse=non' >Décliner</a> 
                    </li>";
        }
    
        
        
        }
}
?>