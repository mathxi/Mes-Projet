<?php

//commentaire sur une ligne
/*
 * Commentaire sur plusieurs
 * lignes
 */

//déclaration de variable (avec un $ devant)
//en php, c'est souple
$uneVariable = 5;
$uneAutre = "toto";
//la variable peut accepter un autre type sans
//problème
$uneAutre = 8;

//chaines de caractères
//peuvent être délimitées par des " ou des '
$s = "une chaine";
$s2 = 'une autre';

//concaténation
$s3 = $s . $s2;
$s4 = '$s est ' . $s;
//avec des " je peux directement utiliser les
//variables à l'intérieur
$s5 = "Le contenu de s2 est $s2";
//avec des ' on ne peut pas, il faut faire 
//des .
$s5bis = 'Le contenu de s2 est ' . $s2;

//pourquoi pas un + pour la concaténation ?
//bah...
$addition = "8" + 5;
//ça fait 13... ou "13"
//structures conditionnelles
//if
if (true) {
    
}
//if else
if (true) {
    
} else {
    
}
//if elseif
if (true) {
    
} elseif (true) {
    
}
//opérateur ternaire
//si $s=="truc" alors $reponse="oui"
//sinon $reponse="non"
$reponse = $s == "truc" ? "oui" : "non";
//plus court à écrire que
if ($s == "truc") {
    $reponse = "oui";
} else {
    $reponse = "non";
}

//switch
$s = "toto";
switch ($s) {
    case "titi":
        echo "c'est titi";
        break;
    case "toto":
        echo "c'est toto";
        break;
    case "tutu":
    case "tata":
        echo "c'est tata ou tutu";
        break;

    default:
        echo "je ne sais pas ce que c'est";
        break;
}

//Boucles
//for
for ($i = 0; $i < 10; $i++) {
    echo $i.'<br>';
}

//while
$i=1;
while ($i<100) {
    echo $i.'<br>';
    $i*=2; //abbrégé pour $i=$i*2;
}
