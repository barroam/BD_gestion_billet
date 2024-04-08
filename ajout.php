<?php
 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 
require_once "config.php";
require_once "billets.php";




if (isset($_POST['submitAjout'])){

    function validate($verifie){
        $verifie = trim($verifie);
        $verifie = stripcslashes($verifie);
        $verifie = htmlspecialchars($verifie);
        return $verifie; }

    $heure_reservation = validate($_POST['heure_reservation']);
    $mode_transport = validate($_POST['mode_transport']);
    $heure_depart = validate($_POST['date_depart']);
    $heure_arrivee = validate($_POST['date__arrive']);
    $ville_depart = validate($_POST['ville_depart']);
    $ville_arrivee = validate($_POST['ville_arrive']);
    $prix = validate($_POST['prix']);
    $numero = validate($_POST['numero']);
    $status = validate($_POST['status']);
    $nom_complet = validate($_POST['nom_complet']);

   $billet = new Billet($connexion,"","","","","","","","","","");
   $billet->create($mode_transport,$heure_reservation,$heure_depart,$heure_arrivee,$ville_depart,$ville_arrivee,$prix,$numero,$status,$nom_complet);
  



}



?>