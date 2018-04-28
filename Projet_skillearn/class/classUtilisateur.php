<?php

class Utilisateur {

    private $id;
    private $mail;
    private $motDePasse;
    private $nom;
    private $prénom;
    private $civilité;
    private $statut;
    private $ville;
    private $description;
    
    //compétence
    private $PHP;
    private $HTML;
    private $javascript;
    private $baseDeDonnée;
    private $réseau;
    private $cpp;
    private $c;
    private $python;
    private $cSharp;
    private $java;
    private $mathématiques;
    private $français;
    private $anglais;
    private $économieGestion;
    private $droit;
    private $autreCompétance;






    public function __construct($données) {
        $this->id = $données['idUtilisateur'];
        $this->mail = $données['mail'];
        $this->motDePasse = $données['motDePasse'];
        $this->nom = $données['nom'];
        $this->prénom = $données['prénom'];
        $this->civilité = $données['civilité'];
        $this->statut = $données['statut'];
        $this->ville = $données['ville'];
        $this->description = $données['description'];
    }

    public function afficher() {
        echo "Bonjour " . " " . $this->civilité . " " . $this->nom . " " . $this->prénom . " votre mail est:" . $this->mail . "";
    }

    public function affichageTable() {

        echo "<tr><td><a href='#'>" . $this->nom . "</a></td>
                <td>" . $this->prénom . "</td>
                <td>" . $this->statut . "</td>";
    }

    public function compétences() {
        $bdd = new PDO('mysql:host=labepsiovgworks.mysql.db;dbname=labepsiovgworks;charset=utf8', 'labepsiovgworks', 'Skillearn2018');
       $recupCompétence = $bdd->query("SELECT * FROM Compétence WHERE idUtilisateur =". $this->id ."");

        while ($donnée = $recupCompétence->fetch()) {
            $this->PHP = $donnée['PHP'];
            $this->HTML = $donnée['HTML/CSS'];
            $this->javascript = $donnée['javascript'];
            $this->baseDeDonnée = $donnée['baseDeDonnée'];
            $this->réseau = $donnée['réseau'];
            $this->cpp = $donnée['c++'];
            $this->c = $donnée['c'];
            $this->python = $donnée['python'];
            $this->cSharp = $donnée['c#'];
            $this->java = $donnée['java'];
            $this->mathématiques = $donnée['mathématiques'];
            $this->français = $donnée['français'];
            $this->anglais = $donnée['anglais'];
            $this->économieGestion = $donnée['économie-gestion'];
            $this->droit = $donnée['droit'];
            
            
            
            
        }
    }
    
    public function afficherCompétence(){
         echo "<td>";
         if($this->PHP > 50){echo " PHP";}
         if($this->HTML > 50){echo " HTML";}
         if($this->javascript > 50){echo " Javascript";}
         if($this->baseDeDonnée > 50){echo " Base de Donnée";}
         if($this->réseau > 50){echo " Réseau";}
         if($this->cpp > 50){echo " C++";}
         if($this->c > 50){echo " C";}
         if($this->python > 50){echo " python";}
         if($this->cSharp > 50){echo " c#";}
         if($this->java > 50){echo " Java";}
         if($this->mathématiques > 50){echo " Mathématique";}
         if($this->français > 50){echo " Français";}
         if($this->anglais > 50){echo " Anglais";}
         if($this->économieGestion > 50){echo " Economie Gestion";}
         if($this->droit > 50){echo " Droit";}
         
         
    }
    

    
    public function autreCompétences() {
        $bdd = new PDO('mysql:host=labepsiovgworks.mysql.db;dbname=labepsiovgworks;charset=utf8', 'labepsiovgworks', 'Skillearn2018');
       $recupCompétence = $bdd->query("SELECT autre FROM AutreCompétence WHERE idUtilisateur =". $this->id ."");

        while ($donnée = $recupCompétence->fetch()) {
            $this->autreCompétance = $donnée['autre'];
            
            
            
            
            
            
        }
    }
    public function afficherAutreCompétance() {
        echo " ".$this->autreCompétance;
        echo "</td></tr>";
    }
    
    
    
    
    
    
    
    
}



?>
<?php /* mémo 
  $bdd = new PDO('mysql:host=labepsiovgworks.mysql.db;dbname=labepsiovgworks;charset=utf8', 'labepsiovgworks', 'Skillearn2018');

  $acceuilUtilisateur = array();

  $reqRecupInfoCo = $bdd->query("SELECT * FROM Utilisateur");

  while ($donnée = $reqRecupInfoCo->fetch()) {

  $acceuilUtilisateur[sizeof($acceuilUtilisateur)] = new Utilisateur($donnée);

  $acceuilUtilisateur[sizeof($acceuilUtilisateur) - 1]->affichageTable();


  }

 */
?>
