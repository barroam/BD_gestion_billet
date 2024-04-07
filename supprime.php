<?php 

  require_once "config.php";
  require_once "billets.php";
  
  if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $billet = new billet($connexion,"","","","","","","","","","");

    //appel de la methode delete pour supprimer
    $billet->delete($id);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Redirection vers la page index.php apres la  suppression du billet
    header('Location:index.php') ;
    exit();
  }else{
    echo"Id de billet non spécifier";
  }

?>