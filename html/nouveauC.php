

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    SRL - Accueil
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
 
  <!-- CSS Files -->
  <link href="../assets/css/font_style.css" rel="stylesheet" />
  <link href="../assets/css/icon_style.css" rel="stylesheet" />
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
   
</head>

<body style="background-color: rgb(255, 255, 255);">
  <div class="wrapper">
      <div class="row" style="height: 100vh; width: auto;">
          <div class="col-4"></div> 
          
          

          <div class="col-4">
            <form class="border border-light p-5 mt-3" method="POST" action="../php/nouveauC.php" >       
                <img class="img mx-auto d-block" src="../assets/img/new.png" />
                <p class="h3 mb-4 text-center">Créer un compte</p>
            
                <div class="row">
                    <div class="col"><input type="text" class="form-control mb-4" name="nom" required placeholder="Nom"></div>
                    <div class="col"><input type="text" class="form-control mb-4" name="pre" required placeholder="Prénom"></div>
                </div>

                <input type="email" class="form-control mb-4" name="eml" placeholder="E-mail" required>

                <input type="password" class="form-control" name="pwd" placeholder="Mot de passe" required></br>

                      <?php
                           if(isset($_GET['erreur'])){
                           $err = $_GET['erreur'];
                             if($err==1)
                             echo "<p style='color:red'>Compte existait déjà !</p>";
                             else
                               if($err==2)
                               echo "<p style='color:red'>Tous les champs doivent être complétés !</p>";

                            }
                      ?>
            
                <button class="btn btn-primary btn-block my-4" type="submit" name="submit">S'enregistrer</button>
     

                <div class="text-center">
                    <p>Vous avez un compte?
                        <a href="connexion.php">Connexion</a> 
                    </p>
                </div>
            </form>
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


</body>

</html>
    
            
            
            
