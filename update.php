<?php 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

  require "config.php";
  require_once "billets.php";
  if (isset($_POST['submitModifier'])){
   
    function validate($verifie){
        $verifie = trim($verifie);
        $verifie = stripcslashes($verifie);
        $verifie = htmlspecialchars($verifie);
        return $verifie; }

        $id = validate($_GET['id']);
    $mode_transport = validate($_POST['mode_transport']);
    $ville_depart = validate($_POST['ville_depart']);
    $ville_arrivee = validate($_POST['ville_arrive']);
    $prix = validate($_POST['prix']);
    $numero = validate($_POST['numero']);
    $status = validate($_POST['status']);
    $nom_complet = validate($_POST['nom_complet']);

    var_dump($prix,$heure_arrivee,$id);
    
        try{

   $billet = new Billet($connexion,"","","","","","","","","","");
   $billet->update($id,$mode_transport,$heure_reservation,$heure_depart,$heure_arrivee,$ville_depart,$ville_arrivee,$prix,$numero,$status,$nom_complet);
   $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            die("erreur");
        }
            
        
}


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
  <?php 
    
    $sql = " SELECT * FROM Billets WHERE id = :id ";

    $stmt = $connexion->prepare($sql);

    $stmt -> bindParam(':id', $_GET["id"], PDO::PARAM_INT );


    if ($stmt->execute()) {

        $billet = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $billet['id'];
       
        $mode_transport = $billet['mode_transport'];
     
        $ville_depart = $billet['ville_depart'];
        $ville_arrivee = $billet['ville_arrive'];
        $prix = $billet['prix'];
        $numero = $billet['numero'];
        $status = $billet['status'];
        $nom_complet = $billet['nom_complet'];

/* heure_reservation, mode_transport, date_depart,
 date__arrive, ville_depart, ville_arrive, 
prix, status, nom_complet, numero*/ 
    } else{
        echo 'Erreur !';
    }
/*action="update.php?id=<?php echo $Id; ?>"*/

  ?>

   <h1 class="titre_form"> Modifier un Billet</h1>
    <form action="update.php?id=<?php echo $id; ?>" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <input type="text" name="nom_complet" id="nom_complet" value="<?php echo $nom_complet?>"  placeholder="Entrer le nom complet">
    <input type="number" name="numero" id="numero"  value="<?php echo $numero?>" placeholder="Entrer le votre numero">
    <input type="text" name="status" id="status" value="<?php echo $status ?>"placeholder="Entrer l'status">
    <input type="text" name="mode_transport" id="mode_transport"value="<?php echo $mode_transport ?>" placeholder="Entrer le mode de transport">
    <input type="text" name="ville_depart" id="ville_depart" value="<?php echo $ville_depart ?>" placeholder="Entrer la ville depart">
    <input type="text" name="ville_arrive" id="ville_arrive" value="<?php echo $ville_arrivee ?>" placeholder="Entrer la ville arrive">
    <input type="number" name="prix" id="prix" value="<?php echo $prix ?>" placeholder="Entrer le montant ">
    <button type="submit" name="submitModifier" id="submitModifier">Ajouter un Billet</button>
    </form><
   </section>

</body>
<style>
      *{
        margin: 00;
        padding: 00;
    }
    form{
        display: flex;
        flex-direction: column;
       gap: 1rem;
        align-items: center;
    }
    input{
        width: 70%;
        height: 2rem;
    }
    button{
        width: 70%;
        height: 2rem;
        background-color: navajowhite;

    }
    .titre_form{
        text-align: center;
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
</style>
</html>