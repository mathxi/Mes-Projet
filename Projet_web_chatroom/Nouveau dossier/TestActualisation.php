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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    </head>
    <body>
        <form id="formAppelUtilisateurs" >
        <input type="text" onkeyup="getUtilisateur()" >
        </form>
        <script>

        </script>
        <script>
            //je fais une fonction qui va chercher l'heure en ajax
            function getUtilisateur() {
                //appel en GET de la page php qui renvoie l'heure
                var x = document.getElementById("formAppelUtilisateurs").elements[0].value;
                
                $.get("ActionAfficherUtilisateur.php?nom="+ x +"", function (data) {
                    //dans data, il y a ce que le php a renvoyé (ici de l'html)
                    //je mets cet html dans le div
                    $(".appelUtilisateurs").html(data);
                });
            }

        </script>
        
        <div style="background-color: red;" class="appelUtilisateurs" >
            <h1>Mes utilisateurs:</h1>
        </div>
    </body>
</html>
