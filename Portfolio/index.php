<?php session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
        <link href="materialize/css/materialize.css" rel="stylesheet" type="text/css"/>
        <script src="materialize/js/materialize.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Condensed" rel="stylesheet">
        <meta name="description" content="Portfolio de Monsieur JANIO Mathieu.">
        <meta name="keywords" content="HTML,CSS,PHP,JavaScript, Mathieu Janio, MATHIEU JANIO , mathieu janio, Mathieu JANIO, JANIO Mathieu">
        <meta name="author" content="JANIO Mathieu">
        <script>
            $(document).ready(function () {
                $('.parallax').parallax();
            });
        </script>
        <title>Portfolio Mathieu Janio</title>
    </head>
    <body>

        <ul class="maPagination">
            <li onclick="location.href = '#haut'" class='waves-effect z-depth-4' ><a><i class="material-icons">person</i>Haut de la page </a></li>

            <li onclick="location.href = '#expérience_professionnelle'" class='waves-effect z-depth-4' ><a><i class="material-icons">work</i>Expérience professionnelle</a></li>

            <li onclick="location.href = '#formation'" class='waves-effect z-depth-4' ><a><i class="material-icons">school</i>Formation</a></li>

            <li onclick="location.href = '#interet'" class='waves-effect z-depth-4' ><a><i class="material-icons">videogame_asset</i>Centre d'intérêt</a></li>

            <li onclick="location.href = '#footer'" class='waves-effect z-depth-4' ><a><i class="material-icons">link</i>Liens entreprises/Ecoles</a></li>
        </ul>





        <div class="parallax-container" >
            <div class="parallax"><img src="media/code.jpg"></div>
        </div>

        <div id="haut" class="section white z-depth-3">
            <div class="row container">

                <h1><img style="height: 10vh; border-radius: 10px; " src="media/moi.jpg"> Mathieu Janio</h2>
                    <h2>Etudiant en Développement et Administration réseau</h2>
                    <h4>Mes projets :</h4>
                    <ul class="Projets">
                        <li><a>- Workshop(compétition interne à l'école) pour la création d'une plateforme collaborative.(Site non mis en ligne)</a></li>
                        <li><a>- Développement d'une application web sous forme de différent salons de chat d'une entreprise.(Site non mis en ligne)</a></li>
                    </ul>


                    <br>
                    <h4>Compétences :</h4>
                    <ul class="Projets">
                        <li><a>- Html/CSS/PHP/SQL -> Capable de réaliser un site web. (Javascript -> Arrive a utiliser une ébauche) </a></li>
                        <li><a>- C++ -> Capable de réaliser un projet simple en ligne de commande</a></li>
                    </ul>
                    <br>
                    <br>

                    </div>
                    </div>



                    <div class="parallax-container">
                        <div class="parallax"><img src="media/surface4.jpg"></div>
                    </div>

                    <div class="section white z-depth-3">
                        <div id="expérience_professionnelle" class="row container"> <h5 class="liensFooter"><a href="#footer">Liens vers les différentes entreprises</a></h5>

                            <h2>Expérience professionnel</h2>
                            <a class="btn">2017</a>
                            <h4>Rezocean – Olonne sur Mer</h4> 
                            <p><i>CDD (Juillet – Août) (Octobre – novembre) (Février 2017)(Juin – Août)</i></p>
                            <p>Tirage de fibre optique pour les entreprises, intégration de liens pour de la supervision. Activités quotidiennes du service support. Traitement des incidents, prise des appels.</p> 

                            <br>
                            <hr>

                            <h4>Rezocean – Olonne sur Mer</h4> 
                            <p><i>Stage (3 semaines) </i></p>
                            <p>Etude des activités des techniciens réseau, tirage de la fibre optique et soudage, installation/configuration des matériels réseau.</p> 

                            <br>
                            <hr>
                            <a class="btn">2016</a>
                            <h4>Dworkin – Prague (République Tchèque, Erasmus) </h4> 
                            <p><i>Stage (5 semaines)</i></p>
                            <p>Prestation de services informatique aux grandes entreprises ( MasterCard, Regus..).  Pratique de la langue anglaise dans un autre pays.  </p> 

                            <br>
                            <hr>

                            <h4>Rezocean – Olonne sur Mer</h4> 
                            <p><i>Stage (3 semaines) </i></p>
                            <p>Tirage de fibre optique pour les entreprises, intégration de liens pour de la supervision. Activités quotidiennes du service support. Traitement des incidents, prise des appels.</p> 

                            <br>
                            <hr>

                            <h4>Assu2000 - Noisy-le-Sec</h4> 
                            <p><i>Stage (3 semaines)</i></p>
                            <p>Aide aux différents projets mis en place par l’entreprise (station de test, changement de switch, amélioration de matériels pour les commerciaux…). </p> 

                            <br>
                            <hr>
                            <a class="btn">2015</a>
                            <h4>Expert – Olonne sur Mer </h4> 
                            <p><i>Stage (3 semaines)</i></p>
                            <p>Aide à l’installation de produits blancs et bruns sous la responsabilité des employés du S.A.V.</p> 

                            <br>
                            <hr>

                            <h4>Accompagnement & Assistance Le Vivier Informatique - St Mathurin </h4> 
                            <p><i>Stage (3 semaines)</i></p>
                            <p>Aide à l’apprentissage de l’outil informatique aux personnes âgées, installation et optimisation de postes. Gestion des stocks de l’entreprise, poke  pour amélioration du matériel en entreprise.</p> 
                        </div>
                    </div>



                    <div class="parallax-container">
                        <div class="parallax"><img src="media/Réseau1.jpg"></div>
                    </div>

                    <div class="section white z-depth-3">
                        <div id="formation" class="row container">
                            <h4>Formations</h4>
                            <a class="btn">2017</a>
                            <p>Première année à l’EPSI, Ecole d’ingénieur spécialisée en Développement Système et Réseau</p>

                            <br>
                            <hr>
                            <a class="btn">2017</a>
                            <p>Obtention du Bac professionnel Système Electronique & Numérique Option Télécom Réseaux – Sainte Marie du Port – Les Sables d’Olonne</p>
                            <br>
                            <hr>
                            <a class="btn">2016</a>
                            <p>BEP lycée Professionnel Sainte Marie du Port – Les Sables d’Olonne</p>
                        </div>
                    </div>



                    <div class="parallax-container">
                        <div class="parallax"><img src="media/Com.jpg"></div>
                    </div>

                    <div class="section white z-depth-3">
                        <div class="row container">
                            <div id="interet" class="col s6">
                                <h4>Centres d’intérêt</h4>
                                <p>Univers du numérique</p>
                                <p>Pratique de sports(Hockey sur roller, football, badminton…)</p>
                            </div>
                            <div id="expérience_professionnelle" class="col s6">
                                <h4>Langue</h4>
                                <h5>Anglais :</h5>
                                <p>Compréhension écrite : fluide</p>
                                <p>Compréhension orale : capable de comprendre une conversation</p>
                                <p>Expression orale : capable de communiquer</p>
                            </div>
                        </div>
                    </div>



                    <div class="parallax-container">
                        <div class="parallax"><img src="media/serveur.jpg"></div>
                    </div>


                    <div id="footer" class="section white z-depth-3">
                        <div class="container">
                            <h4 class="black-text">Liens vers les sites web des entreprises / écoles.</h4>

                            <div class="col s6">
                                <h5 class="black-text">Entreprise :</h5>
                                <ul class="liens" >

                                    <li><a class="text-lighten-3" href="https://rezocean.fr">Rezocean (Opérateur)</a></li>
                                    <li><a class="text-lighten-3" href="https://dworkin.eu/en/">Dworkin(Service IT)</a></li>
                                    <li><a class="text-lighten-3" href="https://www.assu2000.fr/">Assu 2000 (Assurance)</a></li>
                                    <li><a class="text-lighten-3" href="http://magasins.expert.fr/fr_FR/boutique/france/pays-de-la-loire/vendee/olonne-sur-mer/olonne-sur-mer-tele-sables/249">Expert Olonne sur mer(Vendeur brun, blanc gris -> SAV)</a></li>
                                    <li><a class="text-lighten-3" href="http://www.levivierinformatique.fr/">Le Vivier informatique(Service a la personne)</a></li>
                                </ul>
                                <h5 class="black-text">Ecole :</h5>
                                <ul class="liens" >
                                    <li><a class="text-lighten-3" href="http://www.epsi.fr/">EPSI(Ecole d'ingénieur)</a></li>
                                    <li><a class="text-lighten-3" href="https://www.stemarieduport.fr/">Sainte Marie du port(Lycée)</a></li>
                                </ul>
                            </div>

                        </div>

                        <div class="footer-copyright">
                            <div class="container">
                                © 2018 Portfolio Mathieu Janio
                            </div>
                        </div>
                    </div>





                    </body>
                    </html>
