<?php
session_start();
if(isset($_POST['eml']) && isset($_POST['pwd']))
{
    // connexion à la base de données
    
    $db = mysqli_connect('localhost', 'root', '','oaa')
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $eml = mysqli_real_escape_string($db,htmlspecialchars($_POST['eml'])); 
    $pwd = mysqli_real_escape_string($db,htmlspecialchars($_POST['pwd']));
    
    if($eml !== "" && $pwd !== "")
    {
        $requete = "SELECT * FROM apprenant where 
              email = '".$eml."' and mot_de_passe = '".$pwd."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        
        
        if( ! empty($reponse)) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['user'] = $reponse;
          
               
                header('Location: principaleCnx.php');
           
        }
        else
        {
           header('Location: ../html/connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: ../html/connexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: ../html/connexion.php');
}
mysqli_close($db); // fermer la connexion
?>