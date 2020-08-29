<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=oaa', 'root', '') or die('could not connect to database');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
 
  <!-- CSS Files -->
  <link href="../assets/css/font_style.css" rel="stylesheet" />
  <link href="../assets/css/icon_style.css" rel="stylesheet" />
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  
</head>

<body style="background-color: white;">
  
 
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  navbar-block ">
      <div class="container-fluid">
        <div class="col-4">
          <img class="img" src="../assets/img/logo.JPG" />
        </div>
        <div class="col justify-content-left">
          
        </div>
       
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="accueil.php">
                <i class="material-icons">table</i>Acceuil
              </a>
           </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  Account
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="#">Profil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="connexion.php">Déconnexion</a>
              </div>
            </li>  
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
   
    <div class="content" style="background-color: white;">
      <div class="container-fluid">
        <p style="color: white;">some writing....</p>
       
      <div class="col"><p style="font-size :30px; font-variant: small-caps">DASHBOARD -
      
              <?php
              $cour_id = $_GET['idCours'];
              $stmt = $db->prepare("SELECT nomCours FROM cours WHERE idCours=$cour_id");
              $stmt->execute([$cour_id]); 
              $user = $stmt->fetch();
              echo $user['nomCours'];
              ?>  
        </p>

         </div>
<div class="content" > 
 

<div class="col-12" >
  <div class="card card-primary" style="background-color: rgba(155, 2, 155, 0);" >
      <div class="card-header card-header-icon card-header-primary">
         <h4 class="card-title" style="font-size: 30px; color: rgb(155, 2, 155);">Statistiques</h4>
      </div>

<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-chart">
        <div class="card-header card-header-icon card-header-primary">
          <div class="card-icon">
             <i class="material-icons">alarm</i>
          </div>
          <h4 class="card-title" style="font-size: 20px; color: rgb(155, 2, 155);">Gestion du temps</h4>
       </div>
            <div class="card-body">
            <p><br> les résultat des indicateurs calculés ( graphes...)<br><br></p>
         </div>
        
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-chart">
        <div class="card-header card-header-icon card-header-primary">
          <div class="card-icon">
             <i class="material-icons">hourglass_empty</i>
          </div>
          <h4 class="card-title" style="font-size: 20px; color: rgb(155, 2, 155);">Régularité</h4>
       </div>
            <div class="card-body">
            <p><br> les résultat des indicateurs calculés ( graphes...)<br><br></p>
         </div>
        
      </div>
    </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="card card-chart">
      <div class="card-header card-header-icon card-header-primary">
        <div class="card-icon">
           <i class="material-icons">forum</i>
        </div>
        <h4 class="card-title" style="font-size: 20px; color: rgb(155, 2, 155);">Recherche d'information et demande d'aide</h4>
     </div>
          <div class="card-body">
          <p><br> les résultat des indicateurs calculés ( graphes...)<br><br></p>
       </div>
      
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-chart">
      <div class="card-header card-header-icon card-header-primary">
        <div class="card-icon">
           <i class="material-icons">loop</i>
        </div>
        <h4 class="card-title" style="font-size: 20px; color: rgb(155, 2, 155);">Relecture et répétition</h4>
     </div>
          <div class="card-body">
          <p><br> les résultat des indicateurs calculés ( graphes...)<br><br></p>
       </div>
      
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-chart">
      <div class="card-header card-header-icon card-header-primary">
        <div class="card-icon">
           <i class="material-icons">spellcheck</i>
        </div>
        <h4 class="card-title" style="font-size: 20px; color: rgb(155, 2, 155);">Réalisation des quiz et exercices</h4>
     </div>
          <div class="card-body">
          <p><br> les résultat des indicateurs calculés ( graphes...)<br><br></p>
       </div>
      
    </div>
  </div>

</div>
<p style="color: rgba(155, 2, 155, 0.027);">some writing....</p>
</div></div>
      
      
      
      <div class="row">

        <div class="col-7">
          <div class="card card-primary" style="background-color: rgba(155, 2, 155, 0.048);" >
              <div class="card-header card-header-icon card-header-primary">
                 <div class="card-icon">
                    <i class="material-icons">school</i>
                 </div>
                 <h4 class="card-title" style="font-size: 30px; color: rgb(155, 2, 155);">Suggestions</h4>
              </div>
              <div class="card-body">
                              
                      
                <div class="card-body">
                  <br>
                  Afficher les suggestions générées pour ce cours<br> 
                </div>
                    
              </div>
         </div></div>
         
          <div class="col-5" >
            <div class="card card-primary" style="background-color: rgba(155, 2, 155, 0);" >
                <div class="card-header card-header-icon card-header-primary">
                   
                   <h4 class="card-title" style="font-size: 30px; color: rgb(155, 2, 155);">Vos objectifs</h4>
                </div>
                <div class="card-body">
                <?php
                  $loggedUser = $_SESSION['user'];
                  $user_id = $loggedUser['idApprenant'];
                  
              $cour_id = $_GET['idCours'];
              $stmt = $db->prepare("SELECT description_objectif FROM objectif join cours WHERE cours_idCours=$cour_id and apprenant_idApprenant = $user_id ");
              $stmt->execute(); 
              $user = $stmt->fetch();
              echo $user['description_objectif'];
            
              ?>  
               
                      
                </div>
           </div></div>
        </div>
      
<footer class="footer" style="background-color: white;">
    <div class="container-fluid">
      <div class="copyright float-right">
      &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>
      </div>
    </div>
  </footer>
</div>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap-material-design.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<script src="../assets/js/plugins/moment.min.js"></script>

<script src="../assets/js/plugins/sweetalert2.js"></script>

<script src="../assets/js/plugins/jquery.validate.min.js"></script>

<script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>

<script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>

<script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>

<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>

<script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>

<script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>

<script src="../assets/js/plugins/fullcalendar.min.js"></script>

<script src="../assets/js/plugins/jquery-jvectormap.js"></script>

<script src="../assets/js/plugins/nouislider.min.js"></script>

<script src="../assets/js/plugins/arrive.min.js"></script>
 
<script src="../assets/js/plugins/chartist.min.js"></script>

<script src="../assets/js/plugins/bootstrap-notify.js"></script>

<script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>

  
</body>

</html>