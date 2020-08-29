<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Nouveau cours
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
         
         
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="accueil.php">
                  <i class="material-icons">table</i>Acceuil
                </a>
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
                  <a class="dropdown-item" href="#">Déconnexion</a>
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
            <div class="col-3 ml-3">
              <p style="font-size :30px; font-variant: small-caps;">
              Ajouter un cours
            </p>
            </div>
            <!--<div class="col-2"><p style="font-size :20px; text-align: center; font-variant: small-caps">nom utilisateur</p></div>-->
          </div>
          <div class="row" style="margin-left: 200px;" >
              <div class="col-10">
                <div class="card">
                  <div class="card-header card-header-icon card-header-primary">
                    <div class="card-icon">
                      <i class="material-icons">school</i>
                    </div>
                    <h4 class="card-title" style="font-size: 30px; color: rgb(155, 2, 155);">Nouveau cours</h4>
                  </div>
                    <div class="card-body mt-2">
                      <form method="POST" action="../php/nouveauCours.php">
                        <div class="form-group bmd-form-group"> 
                          <label for="plateforme" class="bmd-label-floating" >Plateforme du cours</label>
                          <input type="text" class="form-control" name="plateforme" required>
                        </div>
                        <div class="form-group bmd-form-group">
                          <label for="cours" class="bmd-label-floating">Nom du cours</label>
                          <input type="text" class="form-control" name="cours" required>
                        </div>
                        
                        <div class="form-group bmd-form-group">
                          <label for="id" class="bmd-label-floating">Nom/Id de l'apprenant sur la plateforme d'apprentissage</label>
                          <input type="text" class="form-control" name="id" required>
                        </div>
                        
                        <label class="mt-3" style="color: purple;"><b>Quels sont vos objectifs pour ce cours?</b></label>
                        <div class="form-group purple-border">
                          <textarea class="form-control" id="object" name="dsc" rows="5"
                                    required
                       ></textarea>
                        </div>


                        <!-- messages d'erreurs -->
                      <?php
                      if(isset($_GET['error'])){
                      $err = $_GET['error'];
                        if($err==1)
                        {
                        echo "<p style='color:red'><h3 style='color:red'>Vous suivez déjà ce cours!</h3></p>";
                      }
                        else
                          if($err==2)
                          echo "<p style='color:red'><h3 style='color:red'>Tous les champs doivent être complétés!</h3></p>";

                       }
                       ?>



                      <button type="submit" class="btn btn-outline-primary btn-rounded waves-effect pull-center" name="submit">Ajouter</button>
                      <!--data-toggle="modal"  data-target="#popup"-->
                      
                      
                      </form>
                      <!--popup
                      <div id="popup" class="modal purple-border">
                        <div class="modal-dialog modal-dialog-centered">
                                 <div class="modal-content">
                                  <div class="modal-header">
                                       <p style="font-size: 20px;"> <b>Cours enregistré!</b></p>
                                        </div>
                                     <div class="modal-body">
                                       <p> Votre apprentissage est désormais suivi</p>
                                       <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Fermer</button>
                                      </div>
                                 </div>
                        </div>
                      </div>
                      -->
                      <!--<a href="javascript:;" class="btn btn-round" style="background-color:rgb(255, 255, 255); margin-left: 370px; margin-top: 40px; color: purple; font-size: 15px;">Ajouter</a>-->
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      






  <!--<footer class="footer" style="background-color: white;">
    <div class="container-fluid">
      <div class="copyright float-right">
      &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>
      </div>
    </div>
  </footer>-->
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
    <link href="../assets/js/summernote-lite.min.css" rel="stylesheet">
    <script src="../assets/js/summernote-lite.min.js"></script>
<script> 
$('#object').summernote({
        placeholder: 'objectif-1<br>objectif-2<br>objectif-3<br>...',
        
        tabsize: 2,
        height: 120,
        toolbar: [ ]
      });
</script>

</body>

</html>