<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oaa";
$id = $_GET['idCours'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql1 = "DELETE FROM objectif WHERE cours_idCours=$id";
  $sql2 = "DELETE FROM cours WHERE idCours=$id";
  $conn->exec($sql1);
  $conn->exec($sql2);
  header("Location: ../html/accueil.php");
} catch(PDOException $e) {
  echo $e->getMessage();
}
$conn = null;
?>
