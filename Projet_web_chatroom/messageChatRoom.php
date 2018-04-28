<?php
session_start();

//configuration de la connexion à la base de donnée
//$_SESSION['ChatRoom'] = 0;
if ($_SESSION['connecte'] == 1) {

    include_once 'Config.php';
    $bdd = new PDO("mysql:host=" . Config::SERVEUR . "; port=" . Config::PORT . " ; charset=utf8; dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
    $reqInfoChat = $bdd->query("select * from chatroom where idChatRoom= " . $_GET['ChatRoom'] . "");
    $infoChat = $reqInfoChat->fetch();
    $req3 = $bdd->query("SELECT invité FROM invitation where idUtilisateur =" . $_SESSION['userConnectéID'] . " AND idChatRoom=" . $_GET['ChatRoom'] . "");
    $resReq3 = $req3->fetch();
    ?>
    <!DOCTYPE html>

    <html>
        <head>
            <title>ChatRoom Marcassin</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- DIV DES CHATROOM -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

            <!-- DIV DES CHATROOM -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>



            <link href="chat-css.css" rel="stylesheet" type="text/css"/>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

            <script>

                function ajoutUtilisateur(idChatRoom) {
                    var id;

                    if (confirm("Voulez-vous vraiment ajouter ces utilisateur dans cette chatroom?")) {
                        for (var i = 0; i < tabUtilisateur.length; i++) {

                            id = tabUtilisateur[i];
                            if (id > 0) {
                                $.ajax({
                                    url: 'insertionUtChatRoom.php', // La ressource ciblée
                                    type: 'GET', // Le type de la requête HTTP
                                    data: "idUtilisateur=" + id + "&idChatRoom=" + idChatRoom,
                                    /**
                                     * Le paramètre data n'est plus renseigné, nous ne faisons plus passer de variable
                                     */

                                    dataType: 'html' // Le type de données à recevoir, ici, du HTML.
                                });
                            }
                        }
                        var message = "<h5 style='color: green !important;'>Ajout réussi.</h5>";
                        

                            $("#useAdd").html(message);
                       
                    } else {

                    }

                }
                ;
            </script>

            <script>

                function getUtilisateur(chat) {




                    var x = document.getElementById("formAppelUtilisateurs").elements[0].value;

                    var url = "ActionAfficherUtilisateur.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: "nom=" + x + "&dejapresent=" + tabUtilisateur + "&chat=" + chat,
                        success: function (resultat) {
                            $('.appelUtilisateurs').html(resultat);
                        }
                    });

                }
                ;



                var x = document.getElementById("formAppelUtilisateurs").elements[0].value;
                $.get("ActionAfficherUtilisateur.php?nom=" + x + "&chat=" + chat, function (data) {
                    // verife deja check
                    $(".appelUtilisateurs").html(data);
                });
            </script>
            <script>
                var tabUtilisateur = []
                function PutChips(target) {
                    if ($("#idcheckbox" + target).is(":checked")) {

                        $.get("PutChips.php?idUser=" + target, function (data) {
                            $("#useAdd").html($("#useAdd").html() + data);
                        });
                        tabUtilisateur.push(target)



                    } else {
                        RemoveChips(target);

                    }

                }

                function RemoveChips(target) {
                    $('div').remove('#chip' + target);
                    for (var i = 0; i < tabUtilisateur.length; i++) {

                        if (tabUtilisateur[i] == target) {
                            delete tabUtilisateur[i]
                        }

                    }

                }
            </script>



        </head>
        <body>
            <script>
                var elem = document.querySelector('modal');
                var instance = M.Modal.init(elem);
                $(document).ready(function () {
                    $('.modal').modal();
                });
            </script>
            <script>
                var elem = document.querySelector('moda2');
                var instance = M.Modal.init(elem);
                $(document).ready(function () {
                    $('.moda2').modal();
                });
            </script>
            <script>
                var elem = document.querySelector('moda3');
                var instance = M.Modal.init(elem);
                $(document).ready(function () {
                    $('.moda3').modal();
                });
            </script>
            <script>
                var elem = document.querySelector('moda4');
                var instance = M.Modal.init(elem);
                $(document).ready(function () {
                    $('.moda4').modal();
                });
            </script>

            <!-- slidnav pour mobile -->
            <script src="js/navbar-mobile-init.js"></script>
            <script src="js/navbar-mobile-function.js"></script>

            <!-- NAVBAR -->
            <nav>
                <div class="nav-wrapper">

                    <ul id="nav-mobile" class="sidenav">
                        <li><a href="#" class="sidenav-close">Fermer</a></li>
                        <hr>
                        <li><a class="waves-effect" href="#!"><button data-target="modal3" class="btn modal-trigger" onclick="getUtilisateur()" >Créer une nouvelle ChatRoom</button></a></li>
                        <li><a class="waves-effect" href="#!"><button data-target="modal1" class="btn modal-trigger" onclick="AfficherUtilisateurChatBox(<?php echo $_GET['ChatRoom'] ?>)" >Utilisateurs présent</button></a></li>
                        <li><a class="waves-effect" href="#!"><button data-target="modal2" class="btn modal-trigger" onclick="getUtilisateur(<?php echo $_GET['ChatRoom'] ?>)" >Ajouter des personnes au chat</button></a></li>
                        <li><a class="waves-effect" href="chatRoom.php"><button class="btn modal-trigger">Accueil</button></a></li>
                        <li><a class="waves-effect" href="ActionDeconnexion.php"><button class="btn modal-trigger">Déconnexion</button></a></li>
                    </ul>

                    <a href="#" data-target="nav-mobile" class="sidenav-trigger btn"><i class="material-icons">menu</i></a>
                    <a href="chatRoom.php" class="brand-logo">Projet Marcassin</a>
                    <ul class="right hide-on-med-and-down">

                        <li><button data-target="modal3" class="btn modal-trigger"  >Créer une nouvelle ChatRoom</button></li>
                        <li><button data-target="modal1" class="btn modal-trigger" onclick="AfficherUtilisateurChatBox(<?php echo $_GET['ChatRoom'] ?>)" >Utilisateurs présent</button></li>
                        <li><button data-target="modal2" class="btn modal-trigger" onclick="getUtilisateur(<?php echo $_GET['ChatRoom'] ?>)" >Ajouter des personnes au chat</button></li>
                        <li><a href="chatRoom.php" class="btn">Accueil</a></li>
                        <li><a href="ActionDeconnexion.php" class="btn">Déconnexion</a></li>
                    </ul>
                </div>
            </nav>




            <!-- FIN NAVBAR -->

            <!-- Modal Structure numéro 4 -->

            <div id="modal4" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <div id="ProfilPersonne">

                    </div>

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
                        Choisisez un nom pour votre ChatRoom
                        <input type="text" required="" maxlength="25" placeholder="Nom de votre salon de 25 carractères maximum" name="nomChatRoom">
                        Une petite description pour connaître l'interêt de celui-ci?
                        <input type="text" required="" maxlength="100" placeholder="Petitre déscription" name="description" >
                        <input class='btn'   type="submit" value="Créer" >
                    </form>
                    <img src="images/writing.gif" style="height: 20vh ;" >
                </div>
                <div class="modal-footer">
                    <a href="chatRoom.php" class="modal-action modal-close waves-effect waves-green btn-flat ">Retour</a>
                </div>
            </div>


            <!-- Modal Structure numéro 2 -->

            <div id="modal2" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h4>Ajouter des utilisateurs dans le chat : <?php echo $infoChat['nom'] ?> </h4>
                    <p>Description : <?php echo $infoChat['description'] ?></p>

                    <div id='useAdd' class="col s6"></div>
                    <div class="col s6"></div>






                    <a class="btn" onclick="ajoutUtilisateur(<?php echo $_GET['ChatRoom'] ?>)" >Ajouter</a>

                    <form id="formAppelUtilisateurs" >
                        <p>Recherche d'utilisateurs</p>

                        <nav id="inputRecherche">
                            <div id="textpersonne" class="nav-wrapper">
                                <form>
                                    <div class="input-field">
                                        <input id="search" type="search" onkeyup="getUtilisateur(<?php echo $_GET['ChatRoom'] ?>)" placeholder="Nom/Prénom/Identifiant" required>
                                        <label class="label-icon" for="search"><i class="material-icons"></i></label>
                                        <i class="material-icons"></i>
                                    </div>
                                </form>
                            </div>
                        </nav>
                    </form>
                    <div style="background-color: #f5f5f5" class="appelUtilisateurs" >
                        <h1>Utilisateurs:</h1>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="chatRoom.php" class="modal-action modal-close waves-effect waves-green btn-flat ">Retour</a>
                </div>
            </div>
            <!-- Modal Structure numéro 1 -->

            <div id="modal1" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <div>
                        <h4 class="center-align">Liste des Utilisateurs présent avec vous dans cette ChatRoom</h4>
                    </div>
                    <div id="UtilisateursPresent">

                    </div>

                </div>
                <div class="modal-footer">
                    <a href="chatRoom.php" class="modal-action modal-close waves-effect waves-green btn-flat ">Retour</a>
                </div>
            </div>



            <!-- Contenu de la page -->
            <div class="row ">
                <!-- DIV DES CHATROOM -->
                <div class="col s12 m4 l3 z-depth-3" style=" height: 95vh; overflow:auto; overflow-x: hidden;"> 


                    <ul class="ChatWindows">


                        <script>

                            function getChatBox() {

                                // $.get("Preloader.php", function (data) {

                                //   $(".ChatWindows").html(data);
                                //});
                                $.get("ActualisationChatBox.php", function (data) {

                                    $(".ChatWindows").html(data);
                                });
                            }


                            $(document).ready(function () {

                                getChatBox();
                                window.setInterval("getChatBox()", 3000);
                            });
                        </script>
                        <script>

                            function AfficherUtilisateurChatBox(idChat) {


                                $.get("ActionAfficherUtilisateurPresent.php?ChatRoom=" + idChat, function (data) {

                                    $("#UtilisateursPresent").html(data);
                                });
                            }
                            ;
                        </script>
                        <!--                        Affichage des profils-->
                        <script>

                            function GetProfil(idProfil) {


                                $.get("ActionAfficherProfil.php?ID_Utilisateur=" + idProfil, function (data) {

                                    $("#ProfilPersonne").html(data);
                                });
                            }
                            ;
                        </script>




                </div>


                <!-- DIV DES MESSAGES -->

                <div class="col s12 m8 l9"> 

                    <div class="LogMessage">

                        <script>
                            function AllerEnBasDuScroll() {
                                $(".LogMessage")[0].scrollTop = $(".LogMessage")[0].scrollHeight;
                            }
                            ;
                            function getMessage() {

                                $.get("actualisationMessage.php?ChatRoom=<?php echo $_GET['ChatRoom'] ?>", function (data) {

                                    $(".LogMessage").html(data);

                                });

                                //                                document.getElementById("#finMess").scrollBy(0, 1);

                            }



                            $(document).ready(function () {

                                getMessage();

                                //3000 -> 3s
                                window.setInterval("getMessage()", 3000);
                                $("#idEnvoieMsg").submit(function (e) {

                                    var url = "EnvoieMessage.php";
                                    $.ajax({
                                        type: "POST",
                                        url: url,
                                        data: $("#idEnvoieMsg").serialize(),
                                        success: function (data)
                                        {
                                            getMessage();
                                            $("input[name=message]").val("");

                                        }
                                    });
                                    e.preventDefault();
                                    AllerEnBasDuScroll()

                                });


                            });
                        </script>


                    </div>


                    <?php if ($resReq3['invité'] == 0) { ?>
                        <form id='idEnvoieMsg' action="EnvoieMessage.php" method="post" class="EnvoieMessage">
                            <input required=""  name="message" placeholder="    Ecrivez ici ce que vous voulez envoyer" type="text" class="EnvoieMessageTexte" > 
                            <input hidden="" name="idChatRoom" value="<?php echo $_GET['ChatRoom'] ?>">
                            <button type="submit" class="boutonEnvoie btn waves-effect waves-light">Envoyer <i class="material-icons right">send</i></button>
                        </form>
                        <?php
                    } else {
                        
                    }
                    ?>


                </div>
            </div>

        </body>
    </html>

    <?php
} else {
    header('Location:index.php?connecter=false');
}
?>