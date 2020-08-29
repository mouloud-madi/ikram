<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body style='background:#fff;'>
        <div>
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if($_SESSION['eml'] !== ""){
                    // aller à la page d'accueil de tel apprenant
                    header("Location:../html/accueil.php");
                }
            ?>
            
            
        </div>
    </body>
</html>