<?php
session_start();
require('connexion.php');
$verification="";
?>

<?php  
//$motcle="NULL";
$motcle=$_GET['motcle'];
if(empty($_GET['motcle'])){
//$verification="Pas de resultat pour cette recherche";
header('location:pas_de_resultat.php');
}
else{
  $req=("SELECT * FROM moyen_de_transport WHERE num_plaque_mt LIKE '%$motcle%' OR num_chassis_mt LIKE '%$motcle%' OR num_moteur_mt LIKE '%$motcle%'");
$res=mysqli_query($conn,$req) or  die(mysqli_error());

}


?>
          
          <?php while ($aff=mysqli_fetch_assoc($res)){?>
    
                
                <p class="black"> PLAQUE D'IMMATRICULATION: <?php echo ($aff['num_plaque_mt']) ?></p>
                <p class="black">NUMERO CHASSIS: <?php echo ($aff['num_chassis_mt']) ?></p>
                 <p class="black">NUMERO MOTEUR: <?php echo ($aff['num_moteur_mt']) ?></p>
                 <p class="black">MARQUE: <?php echo ($aff['marque_mt']) ?></p>
                 <p class="black">MODELE: <?php echo ($aff['model_mt']) ?></p>
                
                <a href="apercu_moyen_de_transport.php?id_mt=<?php echo ($aff['id_mt'])?>"><button ><p><strong> Details du moyen de transport </strong></p></button></a>        


<?php }?>
   
  </div> 

  <!-- section de la pagination  -->

<?php
//include('pagination.php')
?>
</div>


</body>
<?php
//include('footer.php');
?>
</html>
<?php
mysqli_close($conn);
?>
