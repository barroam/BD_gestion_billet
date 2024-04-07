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


<section>
    <table border="1" class="tableBillet">
        <thead>
            <tr>
  <th>Billet N°</th>
  <th>Nom Complet du client</th>  
  <th>Date de réservation </th>
  <th>Mode de transport</th>
  <th>Date de depart</th>
  <th>Date de d'arrivéé</th>
  <th>Ville de départ</th>
  <th>Ville d'arrivée</th>
  <th>Prix</th>
  <th>status</th>
  <th>Numero de Téléphone</th>
  <th>Modifier</th>
  <th>Supprimer</th>
 
            </tr>
        </thead>
        <tbody>
        <?php
foreach ($resultat as $row) {
/* heure_reservation, mode_transport, date_depart, date__arrive, ville_depart, ville_arrive, 
prix, status, nom_complet, numero*/ 
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td> <?php echo $row['nom_complet']; ?> </td>
<td><?php echo $row['heure_reservation']; ?></td>
<td><?php echo $row['mode_transport']; ?> </td>
<td><?php echo $row['date_depart']; ?> </td>
<td><?php echo $row['date__arrive']; ?> </td>
<td> <?php echo $row['ville_depart']; ?> </td>
<td> <?php echo $row['ville_arrive']; ?></td>
<td><?php echo $row['prix']; ?></td>
<td>  <?php echo $row['status']; ?> </td>
<td><?php echo $row['numero']; ?> <?php echo "<br>"; ?> </td>
 <td> <a href="update.php?id=<?php echo $row['id']; ?>" >Edit</a></td>
 <td> <a href="supprime.php?id=<?php echo $row['id']; ?>" >Delete</a></td>
 </tr>
 <?php } ?>
        </tbody>
    </table>
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
    .tableBillet{
       border: solid 3px blanchedalmond;
      margin: 4%;
    }
    th{
        background-color:  moccasin;
    }
   
</style>
</html>




  

 




