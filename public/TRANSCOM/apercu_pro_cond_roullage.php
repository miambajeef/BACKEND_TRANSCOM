<?php
session_start();  
include('connexion.php');

$id_cond=htmlspecialchars($_GET['id_pro_cond_fk'])  ;

$_SESSION['id_cond']=htmlentities ($_GET['id_pro_cond_fk']);
?> 

    <h2 class="mb-4">APERCU GENERAL NOM CONDUCTEUR</h2>

      <hr class="two">
      <?php
       $req=("SELECT * FROM conducteur,permis WHERE conducteur.id_cond = permis.id_pro_cond_fk AND  id_pro_cond_fk='".$_SESSION['id_cond']."' ORDER BY date_enreg_permis DESC LIMIT 1");
        $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>
       Non proprietaire: <?php echo ($aff['nom_cond'])?><br>
       Postnom proprietaire: <?php echo ($aff['postnom_cond'])?><br>
       Prenom: <?php echo ($aff['prenom_cond'])?><br>
       Prenom: <?php echo ($aff['date_expiration_permis'])?><br>


 <label>Consulter Vehicule:</label>
 <a href="apercu_proprietaire.php?id_pro=<?php echo ($aff['id_pro']) ?>"><button class="btn btn-warning btn-sm" ><strong>Consulter Proprietaire:</strong> </button></a>

      <hr>
      <?php }?>