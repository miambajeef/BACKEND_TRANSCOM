<?php
session_start();  
include('connexion.php');
?>


<h2 class="">  TABLEAU DE BORD ROULLAGE </h2>

<?php
//echo 'Nom de l\'admin: '.$_SESSION['nom_ut'].'<br>';
$req=("SELECT * FROM utilisateur WHERE nom_ut='".$_SESSION['nom_ut']."'  ");
$res=mysqli_query($conn,$req) or die(mysqli_error());
?>

    <?php while ($aff=mysqli_fetch_assoc($res)){?>

   	<form  method="GET" action="chercher_mt_roullage.php">
         <input id="search-input" name="motcle" value="" placeholder="chercher vehicule par numero plaque/chassis/moteur"  type="text" >
         
         <button type="submit"  name="submit">Go</button>
         </span> 
    </form>
    
    <form  method="GET" action="chercher_pro_cond_roullage.php">
         <input id="search-input" name="motcle" value="" placeholder="chercher conducteur"  type="text" >
         <button type="submit"  name="submit">Go</button>
         </span> 
    </form>

    <a href="deconnexion.php">deconnexion</a><br>
    nom de l'operateur est: <?php echo ($aff['nom_ut'])?></h4><br>
    
   <!-- <a href="liste_moyen_transport.php">Liste Moyen de Transport</a><br> -->

     <!-- <a href="statistique.php">Staistique</a><br> -->
</body>
</html>

<?php }?>
