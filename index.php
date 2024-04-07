 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="#">Accueil</a>
        <a href="afficheBillet.php">les billets</a>
        <a href="#">les clients</a>
    </header>
   <section>
   <h1 class="titre_form"> Gestion Billet</h1>
    <form action="ajout.php" method="POST">
    <input type="text" name="nom_complet" id="nom_complet" placeholder="Entrer le nom complet">
    <input type="number" name="numero" id="numero" placeholder="Entrer le votre numero">
    <input type="text" name="status" id="status" placeholder="Entrer l'status">
    <input type="datetime-local" name="heure_reservation" id="heure_reservation" placeholder="Entrer l'heure de Reservation" >
    <input type="text" name="mode_transport" id="mode_transport" placeholder="Entrer le mode de transport">
    <input type="datetime-local" name="date_depart" id="date_depart" placeholder="Entrer la date de depart">
    <input type="datetime-local" name="date__arrive" id="date__arrive" placeholder="Entrer la date arrive">
    <input type="text" name="ville_depart" id="ville_depart" placeholder="Entrer la ville depart">
    <input type="text" name="ville_arrive" id="ville_arrive" placeholder="Entrer la ville arrive">
    <input type="number" name="prix" id="prix" placeholder="Entrer le montant ">
    <button type="submit" name="submitAjout" id="submitAjout">Ajouter un Billet</button>
    </form>


   </section>



</body>

<style>
    .titre_form{
        margin: 1%;
    }
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

 
</style>
</html>


 