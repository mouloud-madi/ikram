<?php
session_start();
//connexion  à la base de données
$db = new PDO('mysql:host=localhost;dbname=oaa','root','') or die('could not connect to database');

$loggedUser = $_SESSION['user'];
$user_id = $loggedUser['idApprenant'];


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Modifier paramètres
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
 
  <!-- CSS Files -->
  <link href="../assets/css/font_style.css" rel="stylesheet" />
  <link href="../assets/css/icon_style.css" rel="stylesheet" />
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  
</head>

<body style="background-color: white;">
  <div class="wrapper">
 
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

      <div class="content" >
        <div class="container-fluid" style="width: 95%;">
          <div class="row mb-3 mt-5">
            <div class="col-3 ml-3"><p style="font-size :30px; font-variant: small-caps;">Paramètres</p></div>
            <!--<div class="col-2"><p style="font-size :20px; text-align: center; font-variant: small-caps">nom utilisateur</p></div>-->
          </div>
          <div class="row" style="margin-left: 200px;">
              <div class="col-10">
                <div class="card">
                  <div class="card-header card-header-icon card-header-primary">
                    <div class="card-icon">
                      <i class="material-icons">settings</i>
                    </div>
                    <h4 class="card-title" style="font-size: 30px; color: rgb(155, 2, 155);">Paramètres généraux du compte</h4>
                  </div>
                    <div class="card-body mt-2">
                       <table class="table table-hover">
                       <tbody>
                            <tr>
                              <td>
                                NOM
                              </td>
                              <td>
                               <?php if (isset($_SESSION['user'])) : ?>
                                    <?= "<h4>",$_SESSION['user']['nomApprenant']?> <?= $_SESSION['user']['prenomApprenant']."<h3>" ?>
                                   <?php endif ?>
                              </td>
                              <td>
                                <button type="button" rel="tooltip" class="btn pull-right" data-toggle="modal" data-target="#popupnom">
                                  <i class="material-icons">edit</i>
                              </button>
                              </td>
                              </tr>
                            </tr>
                            <tr>
                              <td>
                                ADRESSE E-MAIL
                              </td>
                              <td>
                                 <?php if (isset($_SESSION['user'])) : ?>
                                        <?= "<h4>",$_SESSION['user']['email']?> 
                                  <?php endif ?>
                              </td>
                              <td>
                                <button type="button" rel="tooltip" class="btn pull-right" data-toggle="modal" data-target="#popupmail">
                                  <i class="material-icons">edit</i>
                              </button>
                              </td>
                              </tr>
                            </tr>
                            <tr>
                              <td>
                                MOT DE PASSE
                              </td>
                              <td>
                              <?php if (isset($_SESSION['user'])) : ?>
                                  <?= "<h4>",$_SESSION['user']['mot_de_passe']?>
                              <?php endif ?>
                              </td>
                              <td>
                                <button type="button" rel="tooltip" class="btn pull-right" data-toggle="modal" data-target="#popupmdp">
                                  <i class="material-icons">edit</i>
                              </button>
                              </td>
                              </tr>
                            </tr>
                          </tbody>
                      <!--popup editer nom et prenom-->
                      <div id="popupnom" class="modal purple-border">
                        <div class="modal-dialog modal-dialog-centered">
                                 <div class="modal-content">
                                  <div class="modal-header">
                                       <p style="font-size: 20px;"> <b>Modifier votre nom</b></p>
                                        </div>
                                     <div class="modal-body">
                                        <div class="col"><input type="text" class="form-control mb-4" name="nom" placeholder="Nouveau Nom"></div>
                                        <div class="col"><input type="text" class="form-control mb-4" name="pre" placeholder="nouveau Prénom"></div>
                                       <button type="button" class="btn btn-outline-primary pull-right" data-dismiss="modal">Enregistrer</button>
                                       <button type="button" class="btn pull-right" data-dismiss="modal">Anuler</button>
                                      </div>
                                 </div>
                        </div>
                      </div>

                      <!--popup editer adresse e-mail -->
                      <div id="popupmail" class="modal purple-border">
                        <div class="modal-dialog modal-dialog-centered">
                                 <div class="modal-content">
                                  <div class="modal-header">
                                       <p style="font-size: 20px;"> <b>Modifier votre adresse e-mail</b></p>
                                        </div>
                                     <div class="modal-body">
                                        <div class="col"><input type="email" class="form-control mb-4" name="mail" placeholder="Nouvelle adresse e-mail"></div>
                                        
                                       <button type="button" class="btn btn-outline-primary pull-right" data-dismiss="modal">Enregistrer</button>
                                       <button type="button" class="btn pull-right" data-dismiss="modal">Anuler</button>
                                      </div>
                                 </div>
                        </div>
                      </div>
                      <!--popup editer mot de passe-->
                      <div id="popupmdp" class="modal purple-border">
                        <div class="modal-dialog modal-dialog-centered">
                                 <div class="modal-content">
                                  <div class="modal-header">
                                       <p style="font-size: 20px;"> <b>Modifier votre mot de passe</b></p>
                                        </div>
                                     <div class="modal-body">
                                        <div class="col"><input type="password" class="form-control mb-4" name="mdp" placeholder="Nouveau mot de passe"></div>
                                        
                                       <button type="button" class="btn btn-outline-primary pull-right" data-dismiss="modal">Enregistrer</button>
                                       <button type="button" class="btn pull-right" data-dismiss="modal">Anuler</button>
                                      </div>
                                 </div>
                        </div>
                      </div>


                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      


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