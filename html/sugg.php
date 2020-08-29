<?php
$db = new PDO('mysql:host=localhost;dbname=oaa;charset=utf8', 'root', '') or die('could not connect to database');


$req = "SELECT * from suggestion where idSuggestion='2'";
$result = $db->prepare($req);
    $result->execute();
    $sugg = $result->fetch();
    echo $sugg['description_suggestion'];



?>