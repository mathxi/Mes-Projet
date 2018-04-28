<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test Javascript</title>
        <style>
            .red{
                background-color: red;
                color: windowtext;
            }

            .blue{
                background-color: blue;
                color:white;
            }
            
        </style>
    </head>
    <body>
        <p id="monMessage">Hey ! Coucou :) </p>
        <input type="text" id="MessageModif" >
        <button onclick="modfiMessageCouleur()" >Modifier style</button>
        <button onclick="modfiMessage()" >Modifier texte</button>
        <button onclick="reiniMessCouleur()" >Réinitialiser le style</button>


        <script>
            function reiniMessCouleur(){
                var target = document.getElementById('monMessage');
                target.className = ""
            }
            
            function modfiMessageCouleur() {

                var target = document.getElementById('monMessage');

                if (target.className == "blue") {
                    target.className = "red"
                } else {

                    target.className = "blue"

                }
            }

            function modfiMessage() {
                
                var messageModif = document.getElementById('MessageModif').value;
                document.getElementById('monMessage').textContent = messageModif;

            }

        </script>


    </body>
</html>
