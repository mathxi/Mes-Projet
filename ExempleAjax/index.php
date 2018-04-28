<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Exemple AJAX</h1>
        <p>L'heure ci dessous doit se raffraichir automatiquement toutes les 10 secondes, en AJAX</p>
        <div id="heure">Attente d'interrogation du serveur...</div>

        <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"> </script>
        <script>
            //je fais une fonction qui va chercher l'heure en ajax
            function getHeure() {
                //appel en GET de la page php qui renvoie l'heure
                $.get("getHeure.php", function (data) {
                    //dans data, il y a ce que le php a renvoyé (ici de l'html)
                    //je mets cet html dans le div
                    $("#heure").html(data);
                });
            }

            //quand la page est prête
            $(document).ready(function () {
                //j'appelle cette fonction une première fois
                getHeure();

                //je programme un timer pour l'appeler toutes les 10 secondes (10000 millisecondes)
                window.setInterval("getHeure()", 2000);
            });
        </script>
    </body>
</html>
