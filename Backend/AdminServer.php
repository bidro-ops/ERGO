<?php

include_once "config/gestionSession.php";
include_once "Backend/checkSession.php";
include_once "BDD/connexion.php";


$selectusers = $conn->prepare("SELECT * FROM users");
$selectusers->execute();
$listeusers = $selectusers->fetchAll(PDO::FETCH_ASSOC);


$selectprojects = $conn->prepare("SELECT * FROM projects");
$selectprojects->execute();
$listeprojects = $selectprojects->fetchAll(PDO::FETCH_ASSOC);



?>
