<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=oaa','root','') or die('could not connect to database');
$plateforme=$_POST['plateforme'];
$cours=$_POST['cours'];
$id=$_POST['id'];
$dsc=$_POST['dsc'];
$loggedUser = $_SESSION['user'];
$user_id = $loggedUser['idApprenant'];

if(isset($_POST['submit']))
{
    //requete 
    $sql = "SELECT * FROM cours where plateforme_url = '".$plateforme."' and nomCours = '".$cours."' and id_apprenant_plateforme = '".$id."' ";
    $result = $db->prepare($sql);
   $result->execute();
   //test
   if($result->rowcount() > 0)
   {
      header('Location: ../html/nouveauCours.php?error=1'); // Cours existait déjà !
   }
   else
   {
      if(!empty($plateforme) && !empty($cours) && !empty($id) && !empty($dsc))
      {
        $req1="INSERT INtO cours (plateforme_url, nomCours, id_apprenant_plateforme) VALUES ('$plateforme', '$cours', '$id')";
        $res1=$db->prepare($req1);
        $res1->execute();
        $_SESSION['plateforme'] =$plateforme;
        $_SESSION['cours'] = $cours;

        $last_id = $db->lastInsertId();
       
        $idApprenant = $user_id;
     
        $req2="INSERT INtO objectif (apprenant_idApprenant,	cours_idCours, description_objectif) VALUES ('$idApprenant', '$last_id', '$dsc')";
        $res2=$db->prepare($req2);
        $res2->execute();
        $_SESSION['dsc'] = $dsc;
        header("Location:../html/accueil.php?cours=0");
      }
      else
      {
        header('Location: ../html/nouveauCours.php?error=2'); // Tous les champs doivent être complétés !
      }
   }

}

?>