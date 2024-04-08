<?php

require_once "CRUD.php";
require_once "config.php";

class billet implements ICRUD {
  
    private $heure_reservation;
    private $mode_transport;
    private $heure_depart;
    private $heure_arrivee;
    private $ville_depart;
    private $ville_arrivee;
    private  $prix;
    private $numero;
    private $status;
    private $nom_complet;
    private $connexion;


     public function  __construct( $connexion,$mode_transport,$heure_reservation,$heure_depart,$heure_arrivee,$ville_depart,$ville_arrivee,$prix,$numero,$status,$nom_complet){
       
        $this->connexion=$connexion;
        $this->heure_reservation = $heure_reservation ;
        $this->mode_transport = $mode_transport ;
        $this->heure_depart = $heure_depart ;
        $this->heure_arrivee = $heure_arrivee ;
        $this->ville_depart = $ville_depart ;
        $this->ville_arrivee = $ville_arrivee ;
        $this->prix = $prix ;
        $this->numero = $numero ; 
        $this->status = $status ;
        $this->nom_complet = $nom_complet ;
      
    }


    //l'accesseur et le mutateur de Heure_reservation
public function getHeure_reservation(){
    return $this->heure_reservation ;
}
public function setHeure_reservation($heure_reservation) {
    $this->heure_reservation=$heure_reservation;}

//l'accesseur et le mutateur de mode transport
    public function getMode_transport(){
       return  $this->mode_transport;
    }
    public function setMode_transport($mode_transport){
         $this->mode_transport = $mode_transport ;
        }
//l'accesseur et le mutateur heure de départ 
public function getHeureDepart() {
   return $this->heure_depart; 
}
   public function setHeureDepart($heure_depart){
    $this->heure_depart=$heure_depart;
   }

//l'accesseur et le mutateur heure d'arrivée
public function getheureArrive(){
return $this->heure_arrivee;
}
public function sethureArrive($heure_arrivee){
    $this->heure_arrivee = $heure_arrivee;
}

//l'accesseur et le mutateur de  la ville de départ
    public function getVilleDepart() {
    return $this->ville_depart;
    }
    public function setVilleDepart($ville_depart){
        $this->ville_depart = $ville_depart;
    }

//l'accesseur et le mutateur de ville d'arrivee
public function getVilleArrive() {
    return $this->ville_arrivee;
    }
    public function setVilleArrivet($ville_arrivee){
        $this->ville_arrivee = $ville_arrivee;
    }

//l'accesseur et le mutateur de  prix du billet
    public function getPrixBillet(){
        return $this->prix;
    }
    public function setPrix($prix){
     $this->prix= $prix;
    }

    //l'accesseur et le mutateur de numero
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero->$numero;
    }
    //l'accesseur et le mutateur de  prix du billet
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
     $this->status= $status;
    }

//l'accesseur et le mutateur de Nom complet 
public function getNom_complet(){
    return $this->nom_complet;
}
public function setNomComplet($nom_complet){
    $this->nom_complet=$nom_complet ;
}

//la METHODE AFFICHER

public function create($mode_transport,$heure_reservation,$heure_depart,$heure_arrivee,$ville_depart,$ville_arrivee,$prix,$numero,$status,$nom_complet){
    

    try { 
         // Préparation de la requête avec les paramètres nommés
     
 
$stmt=$this->connexion->prepare("INSERT INTO Billets (heure_reservation, mode_transport, date_depart, date__arrive, ville_depart, ville_arrive, prix, status, nom_complet, numero) 
VALUES (:heure_reservation, :mode_transport, :date_depart, :date__arrive, :ville_depart, :ville_arrive, :prix, :status, :nom_complet, :numero)");
// Liaison des valeurs aux paramètres de la requête
$stmt->bindParam(":heure_reservation", $heure_reservation, PDO::PARAM_STR);
$stmt->bindParam(":mode_transport", $mode_transport, PDO::PARAM_STR);
$stmt->bindParam(":date_depart", $heure_depart, PDO::PARAM_STR);
$stmt->bindParam(":date__arrive", $heure_arrivee, PDO::PARAM_STR);
$stmt->bindParam(":ville_depart", $ville_depart, PDO::PARAM_STR);
$stmt->bindParam(":ville_arrive", $ville_arrivee, PDO::PARAM_STR);
$stmt->bindParam(":prix", $prix, PDO::PARAM_STR);
$stmt->bindParam(":status", $status, PDO::PARAM_STR);
$stmt->bindParam(":nom_complet", $nom_complet, PDO::PARAM_STR);
$stmt->bindParam(":numero", $numero, PDO::PARAM_INT);

// Exécution de la requête
$stmt->execute();

// Redirection vers une autre page après l'insertion
header("Location: index.php");
exit();

        } catch (PDOException $e) {
         die("erreur: impossible d'inserer des données ". $e->getMessage());
        }
     }




//la METHODE LIRE
public function read(){
 try {
   
   $sql= "SELECT * FROM Billets";
   $stmt=$this->connexion->prepare($sql);
   $stmt->execute();
   $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $resultat;


 } catch (PDOException $e) {
   die("erreur impossible d'afficher le billet".$e->getMessage()); 
 }
   }




//la METHODE MODIFIER
public function update($id,$mode_transport,$heure_reservation,$heure_depart,$heure_arrivee,$ville_depart,$ville_arrivee,$prix,$numero,$status,$nom_complet){

   

try { 
    // Préparation de la requête avec les paramètres nommés


   $stmt=$this->connexion->prepare("UPDATE Billets SET    mode_transport = :mode_transport ,  ville_depart = :ville_depart , ville_arrive = :ville_arrive , 
prix = :prix , status = :status , nom_complet = :nom_complet , numero = :numero  WHERE id = :id ");
    
// Liaison des valeurs aux paramètres de la requête
   $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   $stmt->bindParam(":mode_transport", $mode_transport, PDO::PARAM_STR);
   $stmt->bindParam(":ville_depart", $ville_depart, PDO::PARAM_STR);
   $stmt->bindParam(":ville_arrive", $ville_arrivee, PDO::PARAM_STR);
   $stmt->bindParam(":prix", $prix, PDO::PARAM_STR);
   $stmt->bindParam(":status", $status, PDO::PARAM_STR);
   $stmt->bindParam(":nom_complet", $nom_complet, PDO::PARAM_STR);
   $stmt->bindParam(":numero", $numero, PDO::PARAM_INT);

   // Exécution de la requête
   $stmt->execute();

// Redirection vers une autre page après l'insertion
header("Location: index.php");
exit();

   } catch (PDOException $e) {
    die("erreur: impossible d'inserer des données ". $e->getMessage());
   }
}





//la METHODE SUPPRIMER
public function delete($id){
    try {
        // la Requette de suppression
        $sql=" DELETE FROM  Billets WHERE id = :id ";
        // Preparation de la requete
        $stmt =$this->connexion -> prepare($sql);
      //liasion de la valeur id
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);
        //Exécution de la requete
        $stmt->execute();
        return true ;
    } catch (PDOException $e) {
        die("impossible  de Supprimer". $e->getMessage());
    }
}











}


 

?>