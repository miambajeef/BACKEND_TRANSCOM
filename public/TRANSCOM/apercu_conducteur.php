<?php
session_start();	
include('connexion.php');

?>

<?php
include('menu_cond.php');

?>
<form  method="GET" action="chercher_conducteur.php">
         <input id="search-input" name="recherche_nom_cond" value="" placeholder="chercher Proprietaire"  type="text" >
         
         <button type="submit"  name="submit">Go</button>
         </span> 
    </form>


<h5 class="">IDENTITE DU CONDUCTEUR</h5>
              
<?php
$id_cond=$_GET['id_cond'];

$_SESSION['id_cond']=htmlentities ($_GET['id_cond']);
//echo $_SESSION['id_fonct'];

$req=("SELECT * FROM conducteur WHERE id_cond='".$_SESSION['id_cond']."' ");
$res=mysqli_query($conn,$req) or die(mysqli_error());

?>
              <?php while ($aff=mysqli_fetch_assoc($res)){?>
              
<div class="">
  <img height="250" width="250" src=" imgs/<?php echo ($aff['photo_cond']) ?>"/>
</div>
<br><br><hr class="two">

                NOM: <?php echo ($aff['nom_cond']) ?> <br>
                POSTNOM: <?php echo ($aff['postnom_cond'])?><br>
                PRENOM:  <?php echo ($aff['prenom_cond'])?><br>
                Etc...
            
<a href="details_conducteur.php?id_cond=<?php echo ($aff['id_cond']) ?>"><button class="btn btn-warning btn-sm" ><strong>Voir en detail:</strong> </button></a>
               
                <hr class="two">

            <?php }?>


<!-- --------------------------------------------------------------------------- -->



       <h2 class="mb-4">APERCU GENERAL DES VEHICULES DEJA EN POSSESSION COMME CONDUCTEUR</h2>

      <hr class="two">
      <?php
      $id_cond=$_GET['id_cond']  ;

       $req=("SELECT * FROM affectation_conducteur, conducteur ,moyen_de_transport WHERE conducteur.id_cond = affectation_conducteur.id_cond_affect AND moyen_de_transport.id_mt = affectation_conducteur.id_mt_affect AND  id_cond_affect=".$_SESSION['id_cond']." ORDER BY date_enreg_affect_cond DESC LIMIT 1");

        $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

    <?php $etat=  ($aff['etat_cond_affect'])?>


 <?php  
if ($etat!="oui") {
 echo "N'est plus Chauffeur".'<br>';
}
else {
echo "Vrai chuaffeur".'<br>';
}

?>
      Etat : <?php echo ($aff['etat_cond_affect'])?><br>
       Marque: <?php echo ($aff['marque_mt'])?><br>
        Modele : <?php echo ($aff['model_mt'])?><br>
      Main : <?php echo ($aff['main_mt'])?><br>
      Etc...<br>


 <label>Consulter Vehicule:</label>
 <a href="apercu_moyen_de_transport.php?id_mt=<?php echo ($aff['id_mt']) ?>"><button class="btn btn-warning btn-sm" ><strong>Consulter Vehicule:</strong> </button></a>

      <hr>
      <?php }?>
      
<?php
 //include('footer.php');
 ?>
</body>
</html>