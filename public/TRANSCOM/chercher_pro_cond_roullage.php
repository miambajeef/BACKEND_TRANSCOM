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
  $req=("SELECT * FROM permis WHERE nom_pro_cond_fk LIKE '%$motcle%' OR postnom_pro_cond_fk LIKE '%$motcle%' OR prenom_pro_cond_fk LIKE '%$motcle%' ");
$res=mysqli_query($conn,$req) or  die(mysqli_error());

}

?>
          
          <?php while ($aff=mysqli_fetch_assoc($res)){?>
    
                <p class="black"> Nom: <?php echo ($aff['nom_pro_cond_fk']) ?></p>

                <p class="black">Posrnom: <?php echo ($aff['postnom_pro_cond_fk']) ?></p>
                 <p class="black">Prenom: <?php echo ($aff['prenom_pro_cond_fk']) ?></p>
                <a href="apercu_pro_cond_roullage.php?id_pro_cond_fk=<?php echo ($aff['id_pro_cond_fk'])?>"><button ><p><strong> Details du moyen de transport </strong></p></button></a>        

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
