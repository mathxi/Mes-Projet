<?php

// commentaire sur une ligne 
/*
 commentaire sur 
 * plusieurs lignes 
 */


//déclaration de variable 
//en PHP, c'est souple 
$uneVariable=5;
$uneAutre="toto";
//la variable peut accepter un autre type sans problème 
$uneAutre=8;

//chaine de caractères 
//peuve être délimités par des " ou des ' 
$s="une chaine";
$s2="une autre";

//concaténation 

$s3 = $s . $s2;


//avec double cote on peut utiliser une variable dedans alors que simple
//ça fait la variable en texte 
$s4='$s2 est '.$s;
$s5="Le contenu de s2 est $s2";
$s5='Le contenu de s2 est' . $s2;


//pourquoi pas un + pour la concaténation ?
// voilà pourquoi 
$additionquidonne13="8" + 5 ; 

// structure conditionnel 
if (true) {
    
    
}

// if else 
if (true){
    
    
}
else {
    
    
}
// if elseif
if (true){
    
}elseif (true){
    
}
//opérateur ternaire 
//si $s=="truc amprs $reponse="oui"
//sinon $ reponse= "non 
$reponse = $s == "truc" ? "oui" : "non" ;

//plus court à écrire que 

if($s=="truc"){
    $reponse= "oui";
    
}
else {
    reponse="non";
    
    
}


//switch
$s="toto";

switch ($s) {
    case "titi":
        echo    " c'est titi  ";


        break;
    
    case "toto":
        echo    " c'est toto";


        break;
    case "tata"
    case "tutu":
        echo    " c'est tutu ou tata";


        break;
    case "tata":
        echo    " c'est tata";


        break;

    default:
        echo "je ne sais pas ce que c'est"
        break;
}

//boucles 
//for
for ($i=0 ; $i < 10; $i++) {
    
        echo $i.'<br>';
}

//while 

$i=1;
while ($i<100){
        echo $i.'<br>';
        $i*=2; //abregé pour $i=$i . $i
}