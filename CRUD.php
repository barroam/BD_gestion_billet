<?php 
   
   interface ICRUD{
    public function create($mode_transport,$heure_reservation,$heure_depart,$heure_arrivee,$ville_depart,$ville_arrivee,$prix,$nom_complet,$status,$numero);
    public function read();
    public function update();
    public function delete($id);
   }
?>