<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Connexion
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
 
  <!-- CSS Files -->
  <link href="../assets/css/font_style.css" rel="stylesheet" />
  <link href="../assets/css/icon_style.css" rel="stylesheet" />
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  
</head>

<body style="background-color: rgb(255, 255, 255);">
  <div class="wrapper" >
      <div class="row" style="height: 100vh; width: auto;">
          <div class="col-4" ></div>
          <!--<div><img class="img" src="../assets/img/compte.JPG" /></div>-->
          <div class="col-4">
            <form class="border border-light p-5 mt-2"  method="POST" action="../php/connexion.php" >
                <img class="img mx-auto d-block" src="../assets/img/login.png"  /> 
                <p class="h3 mb-4 text-center">Connexion</p>
            
                <input type="email" class="form-control mb-4" name="eml" placeholder="E-mail">

            
                <input type="password" class="form-control mb-4" name="pwd" placeholder="Password">
            
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="">Mot de passe oublié?</a>
                    </div>
                </div>
            
                <button class="btn btn-primary btn-block my-4 mb-3" type="submit" name="submit" >Se connecter</button>
                
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1)
                        echo "<p style='color:red'>Email ou mot de passe incorrect</p>";
                    else
                    if($err==2)
                    echo "<p style='color:red'>Tous les champs doivent être complétés!</p>";

                }
                ?>
                
                <div class="text-center">
                    <p>Pas encore de compte?
                        <a href="nouveauC.php">Créer un compte</a>   
                        
                    </p>
                </div>
            </form>
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
    