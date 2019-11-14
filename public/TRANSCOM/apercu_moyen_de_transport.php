<?php
session_start();	
include('connexion.php');

?>

<?php
include('menu_mt.php');

?>


<h5 class="">IDENTITE MOYEN DE TRANSPORT</h5>
              
<?php
$id_mt=htmlspecialchars($_GET['id_mt'])  ;

$_SESSION['id_mt']=htmlentities ($_GET['id_mt']);
//echo $_SESSION['id_fonct'];

$req=("SELECT * FROM moyen_de_transport WHERE id_mt='".$_SESSION['id_mt']."' ");
$res=mysqli_query($conn,$req) or die(mysqli_error());

?>
              <?php while ($aff=mysqli_fetch_assoc($res)){?>
              
<div class="">
  <img height="250" width="250" src=" imgs/<?php echo ($aff['image_mt']) ?>"/>
</div>
<br><br><hr class="two">

               NUMERO DE PLAQUE: <?php echo ($aff['num_plaque_mt'])?><br> 

                MODELE: <?php echo ($aff['model_mt']) ?> <br>
                TYPE: <?php echo ($aff['type_mt'])?><br>
                MARQUE:  <?php echo ($aff['marque_mt'])?><br>
                ANNEE DE FABRICATION:  <?php echo ($aff['annee_fabrication_mt'])?><br>

               NUMERO DE CHASSIS:  <?php echo ($aff['num_chassis_mt'])?><br>

               NUMERO MOTEUR:  <?php echo ($aff['num_moteur_mt'])?><br>

               POSITION DE VOLANT (MAIN):  <?php echo ($aff['main_mt'])?><br>

               COULEUR:  <?php echo ($aff['couleur_mt'])?><br>
            
<a href="details_moyen_de_transport.php?id_mt=<?php echo ($aff['id_mt']) ?>"><button class="btn btn-warning btn-sm" ><strong>Voir en detail:</strong> </button></a>
                
                <hr class="two">

            <?php }?>


<!-- --------------------------------------------------------------------------- -->
<a href="details_moyen_de_transport.php>Details"></a>


       <h2 class="mb-4">APERCU GENERAL NOM PROPRIETAIRE</h2>

      <hr class="two">
      <?php
       $req=("SELECT * FROM affectation_pro, proprietaire ,moyen_de_transport WHERE proprietaire.id_pro = affectation_pro.id_pro_affect AND moyen_de_transport.id_mt = affectation_pro.id_mt_affect AND  id_mt_affect='".$_SESSION['id_mt']."' ORDER BY date_enreg_affect_pro DESC LIMIT 1");
        $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>
       Non proprietaire: <?php echo ($aff['nom_pro'])?><br>
       Postnom proprietaire: <?php echo ($aff['postnom_pro'])?><br>
       Prenom: <?php echo ($aff['prenom_pro'])?><br>

 <label>Consulter Vehicule:</label>
 <a href="apercu_proprietaire.php?id_pro=<?php echo ($aff['id_pro']) ?>"><button class="btn btn-warning btn-sm" ><strong>Consulter Proprietaire:</strong> </button></a>


      <hr>
      <?php }?>
      
<h2 class="mb-4">APERCU GENERAL NOM CHAUFFEUR</h2>

<?php
       $req=("SELECT * FROM affectation_conducteur, conducteur ,moyen_de_transport WHERE conducteur.id_cond = affectation_conducteur.id_cond_affect AND moyen_de_transport.id_mt = affectation_conducteur.id_mt_affect AND  id_mt_affect='".$_SESSION['id_mt']."' ORDER BY date_enreg_affect_cond DESC LIMIT 1");
        $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>
       Non proprietaire: <?php echo ($aff['nom_cond'])?><br>
       Postnom proprietaire: <?php echo ($aff['postnom_cond'])?><br>
       Prenom: <?php echo ($aff['prenom_cond'])?><br>

 <label>Consulter Vehicule:</label>
 <a href="apercu_conducteur.php?id_cond=<?php echo ($aff['id_cond']) ?>"><button class="btn btn-warning btn-sm" ><strong>Consulter Conducteur:</strong> </button></a>


      <hr>
   <?php }?>





<?php
 //include('footer.php');
 ?>
</body>
</html>