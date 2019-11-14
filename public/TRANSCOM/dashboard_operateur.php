<?php
session_start();  
include('connexion.php');
?>

<h2 class="">  TABLEAU DE BORD OPERATEUR</h2>

<?php
//echo 'Nom de l\'admin: '. $_SESSION['nom_ut'].'<br>';

$req=("SELECT * FROM utilisateur WHERE nom_ut='".$_SESSION['nom_ut']."'  ");
$res=mysqli_query($conn,$req) or die(mysqli_error());
?>

    <?php while ($aff=mysqli_fetch_assoc($res)){?>
                 
   <form  method="GET" action="chercher_mt.php">
         <input id="search-input" name="motcle" value="" placeholder="chercher vehicule par numero plaque/chassis/moteur"  type="text" >
         
         <button type="submit"  name="submit">Go</button>
         </span> 
    </form>

    <a href="deconnexion.php">deconnexion</a><br><br><br>
 nom de l'operateur est: <?php echo ($aff['nom_ut'])?></h4><br>

    <a href="saisie_transport_terrestre.php">saisie trans terrestre</a><br>
    <a href="liste_proprietaire.php">Liste Proprietaire</a><br>
    <a href="liste_conducteur.php">Liste Conducteurs</a><br>
    <a href="liste_moyen_transport.php">Liste Moyen de Transport</a><br>

     <a href="statistique.php">Staistique</a><br>


   


</body>
</html>

<?php }?>
