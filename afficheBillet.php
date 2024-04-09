<?php
    require "config.php";
    require_once "billets.php";
    $billet = new billet($connexion,"","","","","","","","","","") ;
    $resultat = $billet->read();

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
        <a href="index.php">Accueil</a>
        <a href="afficheBillet.php">les billets</a>
        <a href="#">les clients</a>
    </header>


<h1> Vos Billets </h1>


<section>
   
        <?php
foreach ($resultat as $row) {
/* heure_reservation, mode_transport, date_depart, date__arrive, ville_depart, ville_arrive, 
prix, status, nom_complet, numero*/ 
?>
<div class="billet"> 

<div class="billetInfo"> N° <h4><?php echo $row['id']; ?> 
 </h4> Nom Complet <h4><?php echo $row['nom_complet']; ?> 
</h4> Numéro Téléphone: <h4><?php echo $row['numero']; ?> </h4></div> 

<div class="billetDepart"><h4> <?php echo $row['ville_depart']; ?>
 </h4> <br>  <h4><?php echo $row['date_depart']; ?> </h4> <br></div>
<div class="billetDestination"> <h4> <?php echo $row['ville_arrive']; ?> </h4> 
 <h4><?php echo $row['date__arrive']; ?> </h4>  </div>
<div class="billetqualite"> <h4><?php echo $row['mode_transport']; ?> </h4> 
 <h4>  <?php echo $row['status']; ?> </h4>  <?php echo $row['prix']; ?> </div>

 <div>  <h4 ><?php echo $row['heure_reservation']; ?></h4> 
 <a href="update.php?id=<?php echo $row['id']; ?>" >Edit</a>
 <a href="supprime.php?id=<?php echo $row['id']; ?>" >Delete</a>
</div>

 </div>  
 
 <?php } ?>

</section>

</body>
<style>
    /* heure_reservation, mode_transport, date_depart, date__arrive, ville_depart, ville_arrive, 
prix, status, nom_complet, numero*/ 
    *{
        margin: 00;
        padding: 00;
    }
   
     header{
        padding: 1%;
        background-color: black;
        list-style: none;
        text-decoration: none;
        display: flex;
        justify-content: space-around;

    }
    header a {
        text-decoration: none;
        color:wheat;
    }
    section{
        display: flex;
        flex-wrap: wrap;

    }
 .billet{
  
    background-color: wheat;
    margin: 1%;
    padding: 1%;
   width: 28%;
 }
.billetInfo{
    display: flex;
    justify-content: space-around;

}
 
   
</style>
</html>




  

 




