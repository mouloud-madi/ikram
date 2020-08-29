<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=oaa', 'root', '') or die('could not connect to database');
$loggedUser = $_SESSION['user'];
$user_id = $loggedUser['idApprenant'];
$sql = "SELECT cours.* 
          FROM cours
          LEFT JOIN objectif on objectif.cours_idCours = cours.idCours
          where objectif.apprenant_idApprenant = $user_id 
          order By idCours DESC
          ";
$result = $db->prepare($sql);
$result->execute();
$cours = $result->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<!-- ok -->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        SRL - Accueil
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <!-- CSS Files -->
    <link href="../datatables/dataTables.bootstrap4.min.css" rel="stylesheet"/>
    <link href="../assets/css/font_style.css" rel="stylesheet"/>
    <link href="../assets/css/icon_style.css" rel="stylesheet"/>
    <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet"/>

</head>

<body style="background-color: white;">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  navbar-block ">
        <div class="container-fluid">
            <div class="col-4">
                <img class="img" src="../assets/img/logo.JPG"/>
            </div>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">

                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
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
    <div class="content">
        <div class="container-fluid" style="width: 95%;">
            <div class="row mb-3 mt-5">
                <div class="col-1"><p style="font-size :30px; font-variant: small-caps">Bienvenu</p></div>
                <!--<div class="col-2"><p style="font-size :20px; text-align: center; font-variant: small-caps">nom utilisateur</p></div>-->
            </div>

            <form methode="POST" action=""> <!--c'est okk -->
                <div class="row">
                    <div class="col">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <a href="javascript:;">
                                    <img class="img" src="../assets/img/learner.png"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <?= "<h3>", $_SESSION['user']['nomApprenant'] ?> <?= $_SESSION['user']['prenomApprenant'] . "<h3>" ?>
                                <?php endif ?>
                                <!-- ///le cas d'enregistrement

                               if (isset($_GET['afficher'])) {
                                   $aff = $_GET['afficher'];
                                   if ($aff==0) {
                                       if (isset($_SESSION['nom']) && isset($_SESSION['pre']) && isset($_SESSION['eml'])) {
                                           echo "<h3>",$_SESSION['nom']."\n".$_SESSION['pre']."<br>","</h3>";
                                       }
                                   }
                               }
                               -->
                                <br>
                                <a href="../html/EditerProfil.php" class="btn btn-primary btn-round">Editer profil</a>
                            </div>
                        </div>
                    </div>
            </form>

            <div class="col-8 mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title ">Cours enregistrés</h4>
                                    </div>
                                    <div class="col-6">
                    <span class="float-right">
                    <a href="nouveauCours.php" class="text-light">
                    Ajouter un cours
                    <i class="material-icons text-light">add</i>
                    </a>
                    </span>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">

                                <table class="table table-hover table-striped border" id="table">
                                    <thead class="thead-light">
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Plateforme</th>
                                    <th width="5%">Supprimer</th>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($cours as $c) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $i++ ?>
                                            </td>
                                            <td>
                                                <a href="dashboard.php?idCours=<?php echo $c['idCours'] ?>"
                                                   data-toggle="tooltip" data-placement="top"
                                                   title="Accéder au tableau de bord du cours">
                                                    <b><?= $c['nomCours'] ?></b>
                                                </a>
                                            </td>
                                            <td>
                                                <?= $c['plateforme_url'] ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm mt-0 mb-0"
                                                        data-toggle="modal" data-target="#popup">
                                                    <i class="material-icons">delete_forever</i> Supprimer
                                                </button>
                                                <!--popup-->
                                                <div id="popup" class="modal purple-border">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <p style="font-size: 20px;"><b>Voules-vous vraiment
                                                                        supprimer ce cours ?</b></p>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> Toutes vos données seront perdues!</p>
                                                                <a href="../php/supprimer.php?idCours=<?php echo $c['idCours'] ?>"
                                                                        class="btn btn-outline-primary">
                                                                        Confirmer
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row" style="margin-left: 0px;">
            <div class="col-12">
                <div class="card card-primary" style="background-color: rgba(155, 2, 155, 0.048);">
                    <div class="card-header card-header-icon card-header-primary">
                        <div class="card-icon">
                            <i class="material-icons">school</i>
                        </div>
                        <h4 class="card-title" style="font-size: 30px; color: rgb(155, 2, 155);">Stratégies à
                            utiliser</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class=" text-primary">
                                <th></th>
                                <th></th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <b>> Gestion du temps </b>
                                    </td>
                                    <td>
                                        - Estimez le temps nécessaire à la formation et répartissez les heures
                                        uniformément entre les différents jours de la semaine en fixant un planning
                                        clair et en définissant le nombre d'heures à étudier chaque jour (entre deux à
                                        trois heures par jour), cela vous permettra d'être régulier.
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>> Structuration de l'environnement </b>
                                    </td>
                                    <td>
                                        - Aménagez et organiser votre espace de travail et trouvez un endroit dédié à l
                                        apprentissage (calme), idealement un bureau, loin de toute distraction.
                                        <br> - Dégagez votre espace de travail de tout objet inutile et distrayant
                                        (smartphone, magazines, nourriture …), désactivez les notifications sur tous vos
                                        appareils connectés, fermez voire bloquez les accès aux réseaux sociaux sur
                                        votre ordinateur.
                                        <br> - Prenez soin d avoir a portee de main tout le materiel necessaire.
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <b>> Recherche d’information et demande d’aide </b>
                                    </td>
                                    <td>
                                        - Accédez régulièrement au forum de discussion de la plateforme d'apprentissage,
                                        demandez de l'aide chaque fois que vous en avez besoin en posant des questions
                                        pertinentes.
                                        <br> - Essayez également d'aider en répondant aux questions déjà posées, cela
                                        vous permettra de consolider ce que vous avez appris.

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <b>> Réalisation des tests, exercices et quiz </b>
                                    </td>
                                    <td>
                                        - Essayez de compléter tous les quiz et exercices proposés, cela vous aidera à
                                        connaître les parties du cours que vous n'avez pas bien comprises, et vous
                                        permettra d'identifier facilement vos lacunes.
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <b>> Relecture pour consolidation ou rectification </b>
                                    </td>
                                    <td>
                                        - Relisez les chapitres où vous ressentez des lacunes, cela vous permettra
                                        d’améliorer votre niveau de compréhension.
                                        <br> - Si vous trouvez qu'un chapitre est difficilement compréhensible, prenez
                                        aussi la peine de relire les chapitres précédents.

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <b>> Auto-explication </b>
                                    </td>
                                    <td>
                                        - Essayez de reformuler ce que vous avez lu et appris et expliquez-le à
                                        vous-même en utilisant vos propres mots. Cela soutiendra et consolidera votre
                                        compréhension et vous aidera à intégrer les nouvelles informations avec vos
                                        connaissances déjà acquises.
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <b>> Auto-suivi et auto-évaluation </b>
                                    </td>
                                    <td>
                                        - Evaluez régulièrement vos progrès en analysant vos objectifs prédéfinis, cela
                                        vous permettra de savoir si vous êtes sur la bonne voie.
                                        <br> - Posez vous les bonne questions (ex. Est-ce que j’arrive à bien comprendre
                                        ? Suis-je entrain de bien avancer ?) cela vous permettra d’être plus efficace
                                        lors de votre apprentissage.
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
<script src="../datatables/jquery.dataTables.min.js"></script>
<script src="../datatables/dataTables.bootstrap4.min.js "></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $(document).ready(function () {
        $('#table').DataTable({
            "language": {
                "sEmptyTable": "Aucune donnée disponible dans le tableau",
                "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Afficher _MENU_ éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing": "Traitement...",
                "sSearch": "Rechercher :",
                "sZeroRecords": "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sLast": "Dernier",
                    "sNext": "Suivant",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                },
                "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    }
                }
            },

            "columnDefs": [{
                "targets": 3,
                "orderable": false
            }]

        });
    });
</script>
</body>
</html>
<style>
    .dataTable > thead > tr > th, .dataTable > tbody > tr > th, .dataTable > tfoot > tr > th, .dataTable > thead > tr > td, .dataTable > tbody > tr > td, .dataTable > tfoot > tr > td {
        padding: 9px !important;
    }

    .page-item.active .page-link {
        color: #fff !important;
        background-color: #9124a3 !important;
        border-color: #9124a3 !important;
    }

    .page-link {
        color: #9124a3 !important;
        background-color: #fff !important;
        border: 1px solid #dee2e6 !important;
    }

    .page-link:hover {
        color: #fff !important;
        background-color: #000 !important;
        border-color: #000 !important;
    }
</style>