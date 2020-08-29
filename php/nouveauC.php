<?php  
session_start();
 //connexion
 $db = new PDO('mysql:host=localhost;dbname=oaa','root','') or die('could not connect to database');

$NOM=$_POST['nom'];
$PRE=$_POST['pre'];
$EML=$_POST['eml'];
$PWD=($_POST['pwd']);

if(isset($_POST['submit'])){
   //requete 
   $sql = "SELECT * FROM apprenant where  email = '$EML'";
   $result = $db->prepare($sql);
   $result->execute();
   //test
   if($result->rowcount() > 0)
   {
      
      header('Location: ../html/nouveauC.php?erreur=1'); // Compte existait déjà !
   }
   else
   {
      if(!empty($NOM) && !empty($PRE) && !empty($EML) && !empty($PWD)){

        $req="INSERT INtO apprenant (nomApprenant, prenomApprenant, email, mot_de_passe) VALUES ('$NOM', '$PRE', '$EML', '$PWD')";
        $res=$db->prepare($req);
        $res->execute();
        //$_SESSION['nom'] = $NOM;
        //$_SESSION['pre'] = $PRE;
        //$_SESSION['eml'] = $EML;
        //header("Location: ../html/accueil.php?afficher=0");
        header("Location: ../html/connexion.php");

      }
      else
      {
       
        header('Location: ../html/nouveauC.php?erreur=2'); // Tous les champs doivent être complétés !
      }
    }   
     }
     



?>
