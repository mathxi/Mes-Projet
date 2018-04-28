<?php session_start() ?>
<!DOCTYPE html>
<?php
//configuration de la connexion à la base de donnée
if ($_SESSION['connecte'] == 1) {


    $_SESSION['ChatRoom'] = 0;
    include_once 'Config.php';
    $bdd = new PDO("mysql:host=" . Config::SERVEUR . "; port=" . Config::PORT . " ; charset=utf8; dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
    date_default_timezone_set('Europe/Paris');




    /* $reqRecupPseudoCo = $bdd->prepare("SELECT * FROM utilisateur where id =" . $_SESSION['userConnectéID'] . ""); */
    
    $reqRecupPseudoCo = $bdd->prepare("SELECT * FROM utilisateur where id = :id");
    $reqRecupPseudoCo ->bindParam("id",  $_SESSION['userConnectéID'] );
    $reqRecupPseudoCo->execute();
    
    
    
    while ($donnéeRecupPseudo = $reqRecupPseudoCo->fetch()) {
        $_SESSION['userConnectéIdentifiant'] = $donnéeRecupPseudo['identifiant'];
        $_SESSION['userConnectéEmail'] = $donnéeRecupPseudo['email'];
        $_SESSION['userConnectéCivilité'] = $donnéeRecupPseudo['civilité'];
        $_SESSION['userConnectéNom'] = $donnéeRecupPseudo['nom'];
    }
    ?>
    <html>
        <head>
            <title>ChatRoom Marcassin</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <!-- Compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

            <!-- Compiled and minified JavaScript -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
            <!--
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            -->
            <link href="https://fonts.googleapis.com/css?family=Bellefair" rel="stylesheet">
            <!--<link href="chat-css.css" rel="stylesheet" type="text/css"/> -->
            <link href="chat-css.css" rel="stylesheet" type="text/css"/>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


            <script>
                //je fais une fonction qui va chercher l'heure en ajax
                function getUtilisateur() {
                    //appel en GET de la page php qui renvoie l'heure
                    var x = document.getElementById("formAppelUtilisateurs").elements[0].value;
                    $.get("ActionAfficherUtilisateur.php?nom=" + x + "", function (data) {
                        //dans data, il y a ce que le php a renvoyé (ici de l'html)
                        //je mets cet html dans le div
                        $(".appelUtilisateurs").html(data);
                    });
                }

            </script>

        </head>
        <body>
            <script>
                var elem = document.querySelector('modal');
                var instance = M.Modal.init(elem);

                // Or with jQuery

                $(document).ready(function () {
                    $('.modal').modal();
                });
            </script>
            <script>
                var elem = document.querySelector('moda3');
                var instance = M.Modal.init(elem);



                $(document).ready(function () {
                    $('.moda3').modal();
                });
            </script>

            <!-- bouton modif description-->
            <script>
                var elem = document.querySelector('modal5');
                var instance = M.Modal.init(elem);
                $(document).ready(function () {
                    $('.modal5').modal();
                });
            </script>
            <!-- slidnav pour mobile -->
            <script src="js/navbar-mobile-init.js"></script>
            <script src="js/navbar-mobile-function.js"></script>

            <nav>
                <div class="nav-wrapper">

                    <!-- Navbar (mobile) -->
                    <ul id="nav-mobile" class="sidenav">
                        <li><a href="#" class="sidenav-close">Fermer</a></li>
                        <hr>
                        <li><a class="waves-effect" href="#!"><button data-target="modal3" class="btn modal-trigger" onclick="getUtilisateur()" >Créer une nouvelle ChatRoom</button></a></li>
                        <li><a class="waves-effect" href="chatRoom.php"><button class="btn modal-trigger">Accueil</button></a></li>
                        <li><a class="waves-effect" href="ActionDeconnexion.php"><button class="btn modal-trigger">Déconnexion</button></a></li>
                    </ul>

                    <a href="#" data-target="nav-mobile" class="sidenav-trigger btn"><i class="material-icons">menu</i></a>
                    <a href="chatRoom.php" class="brand-logo">Projet Marcassin</a>
                    <ul class="right hide-on-med-and-down">
                        <li><button data-target="modal3" class="btn modal-trigger" onclick="getUtilisateur()" >Créer une nouvelle ChatRoom</button></li>
                        <li><a href="chatRoom.php" class="btn">Accueil</a></li>
                        <li><a href="ActionDeconnexion.php" class="btn">Déconnexion</a></li>
                    </ul>

                </div>
            </nav>

            <!--  SLIDNAV (mobile)  -->
            
            
            




            <ul class="sidenav" id="mobile-demo">
                <li><button data-target="modal1" class="btn modal-trigger" onclick="getUtilisateur()">Gestion des ChatRooms</button></li>
            </ul>







            <div class="row">

                <div class="col s12 m4 l3 div-gauche " style=" height: 95vh; overflow-y: scroll;"> 


                    <ul class="ChatWindows">


                        <script>

                            function getChatBox() {

                                $.get("ActualisationChatBox.php", function (data) {

                                    $(".ChatWindows").html(data);
                                });
                            }


                            $(document).ready(function () {

                                getChatBox();


                                window.setInterval("getChatBox()", 3000);
                            });
                        </script>




                </div>
                <!-- DIV DE L'ACCUEIL -->
                <div class="col s12 m8 l9 LogMessage"> 

                    <script>

                        function getNewMessages() {

                            $.get("ActualisationNbMessagesAccueil.php", function (data) {

                                $(".LogMessage").html(data);
                            });
                        }


                        $(document).ready(function () {

                            getNewMessages();


                            window.setInterval("getNewMessages()", 3000);
                        });
                    </script>





                 <?php 
                 /* $reqRecupPseudoCo = $bdd->prepare("SELECT * FROM utilisateur where id =" . $_SESSION['userConnectéID'] . ""); */
    
    
    
                $reqRecupDescription = $bdd->prepare("SELECT Description FROM utilisateur where id = :idDesc");
                $reqRecupDescription ->bindParam("idDesc", $_SESSION['userConnectéID']);
                $reqRecupDescription->execute();
                
                while ($donnéeRecupDescription = $reqRecupDescription->fetch()){
                    $DescriptionUtilisateur = $donnéeRecupDescription['Description'];
                }  
                ?>


                </div>

                <!-- Modal Structure numéro 5 -->

                <div id="modal5" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <h4>Modification de vos informations</h4>
                        <div id="ProfilPersonne" ></div>
                        <form method="POST" action="modifierDescription.php?idUtilisateur=" >
                            <input placeholder="Votre description (500 caractères maximum)" maxlength="500" type="text" value=<?php echo" '$DescriptionUtilisateur'";?> name="Description" >
                            <button class="btn" type="submit" >Modifier</button>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <a href="chatRoom.php" class="modal-action modal-close waves-effect waves-green btn-flat ">Retour</a>
                    </div>
                </div>


                <!-- Modal Structure numéro 3 -->

                <div id="modal3" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <h4>Création d'une nouvelle ChatRoom </h4>

                        <form action="insertionChatRoom.php" method="POST" >
                            Choisissez un nom pour votre ChatRoom
                            <input type="text" required="" maxlength="25" placeholder="Nom de votre salon de 25 caractères maximum" name="nomChatRoom">
                            <input type="text" required="" maxlength="100" placeholder="Petite déscription" name="description" >
                            <input class='btn'   type="submit" value="Créer" >
                        </form>

                    </div>
                    <div class="modal-footer">
                        <a href="chatRoom.php" class="modal-action modal-close waves-effect waves-green btn-flat ">Retour</a>
                    </div>
                </div>

            </div>


        </body>
    </html>

    <?php
} else {
    ?>
    <script LANGUAGE="JavaScript">
        window.location.replace("index.php?connecter=false");
    </script>
    <?php
}